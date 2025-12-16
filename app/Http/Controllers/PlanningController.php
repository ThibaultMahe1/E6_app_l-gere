<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class PlanningController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $events = Event::with('eventTypes')->get()->map(function ($event) use ($user) {
            $isCours = $event->eventTypes->contains('name', 'cours');
            $typeNames = $event->eventTypes->pluck('name')->join(', ');

            // Determine subscription status
            $subscribedGlobally = false;
            $subscribedDates = [];

            if ($user) {
                // Ensure pivot fields are loaded and filter by the current user correctly
                $userSubs = $event->users()->where('users.id', $user->id)->withPivot(['date', 'is_cancelled'])->get();
                $subscribedGlobally = $userSubs->contains(function ($sub) {
                    return $sub->pivot->date === null;
                });
                $subscribedDates = $userSubs->whereNotNull('pivot.date')->pluck('pivot.date')->toArray();
            }

            $data = [
                'id' => $event->id,
                'title' => $event->name,
                'description' => $event->description,
                'type' => $typeNames,
                'subscribedGlobally' => $subscribedGlobally,
                'subscribedDates' => $subscribedDates,
                'className' => 'fc-event-custom'
            ];

            if ($isCours) {
                $data['daysOfWeek'] = [$event->start_date->dayOfWeek];
                $data['startTime'] = $event->start_date->format('H:i:s');
                $data['endTime'] = $event->end_date->format('H:i:s');
                $data['startRecur'] = $event->start_date->format('Y-m-d');
            } else {
                $data['start'] = $event->start_date;
                $data['end'] = $event->end_date;
            }

            return $data;
        });

        return view('planning', compact('events'));
    }

    public function subscribe(Request $request, Event $event)
    {
        $user = auth()->user();
        $adherent = $user->adherent;
        $date = $request->input('date'); // Expected format: Y-m-d
        $subscriptionType = $request->input('subscription_type', 'unique'); // 'unique' or 'year'

        if (!$adherent) {
            return back()->with('error', 'Compte adhérent introuvable.');
        }

        $isCours = $event->eventTypes->contains('name', 'cours');

        if ($adherent->formule === 'annee') {
            if ($subscriptionType === 'year') {
                // Yearly subscription: Subscribe to the series (date = null)
                if ($event->users()->where('user_id', $user->id)->wherePivot('date', null)->exists()) {
                    return back()->with('info', 'Vous êtes déjà inscrit à l\'année pour ce cours.');
                }
                
                // Remove any individual subscriptions (or cancellations) to avoid duplicates/conflicts
                $event->users()->detach($user->id);

                $event->users()->attach($user->id, ['date' => null]);
                return back()->with('success', 'Inscription à l\'année validée !');
            } else {
                // Specific session subscription for 'annee' user
                // Assuming no credit cost for 'annee' users for extra sessions? Or maybe they just want to book a spot.
                // The prompt implies they have the choice.
                
                $targetDate = $isCours ? $date : null;
                if ($event->users()->where('user_id', $user->id)->wherePivot('date', $targetDate)->exists()) {
                    return back()->with('info', 'Vous êtes déjà inscrit pour cette séance.');
                }
                $event->users()->attach($user->id, ['date' => $targetDate]);
                return back()->with('success', 'Inscription à la séance validée !');
            }
        } 
        elseif ($adherent->formule === 'carte') {
            // Card subscription: Subscribe to specific date
            if ($adherent->value <= 0) {
                return back()->with('error', 'Crédit insuffisant sur votre carte.');
            }

            // For recurring events (cours), we need a specific date
            if ($isCours && !$date) {
                return back()->with('error', 'Une date est requise pour l\'inscription à la carte.');
            }

            // If it's not a recurring event, date is null (or we could store the event date, but let's stick to null for "whole event")
            // However, the prompt says "recupere la date du cour... et naffiche que celui la".
            // So for 'cours', we use $date. For non-cours, we use null.
            $targetDate = $isCours ? $date : null;

            if ($event->users()->where('user_id', $user->id)->wherePivot('date', $targetDate)->exists()) {
                return back()->with('info', 'Vous êtes déjà inscrit pour cette séance.');
            }

            $event->users()->attach($user->id, ['date' => $targetDate]);
            $adherent->decrement('value');

            return back()->with('success', 'Inscription validée ! 1 crédit débité.');
        } 
        else {
            return back()->with('error', 'Aucune formule d\'abonnement active (Carte ou Année).');
        }
    }

    public function myPlanning()
    {
        $user = auth()->user();
        // Eager load eventTypes and pivot data
        $events = $user->events()->with('eventTypes')->withPivot(['date', 'is_cancelled'])->get()->map(function ($event) {
            $isCours = $event->eventTypes->contains('name', 'cours');
            $typeNames = $event->eventTypes->pluck('name')->join(', ');
            $pivotDate = $event->pivot->date;
            $isCancelled = $event->pivot->is_cancelled;

            // If this specific row is a cancellation, we should not render it as an event.
            // However, we are iterating over *subscriptions*.
            // If I have a yearly subscription (date=null), I get one event object here.
            // If I have a cancellation (date='...', is_cancelled=1), I get *another* event object here.
            // We need to handle this.
            
            if ($isCancelled) {
                return null; // Skip cancellation rows
            }

            $data = [
                'id' => $event->id,
                'title' => $event->name,
                'description' => $event->description,
                'type' => $typeNames,
                'className' => 'fc-event-custom',
                'pivotDate' => $pivotDate,
                'isYearly' => ($pivotDate === null)
            ];

            // If yearly subscription, we need to know which dates are cancelled
            if ($pivotDate === null && $isCours) {
                // Find cancellations for this event and user
                // We can't easily access other pivot rows here without a new query or better loading.
                // Let's do a quick query or filter from the collection if possible.
                // Since we are inside a map, it's tricky.
                // Better approach: Fetch all pivot rows for this user/event beforehand?
                // Or just query here (N+1 problem, but okay for now).
                $cancelledDates = $event->users()
                                        ->where('user_id', auth()->id())
                                        ->where('event_id', $event->id)
                                        ->where('is_cancelled', true)
                                        ->pluck('event_user.date') // Specify table name to avoid ambiguity
                                        ->toArray();
                
                $data['cancelledDates'] = $cancelledDates;
            }

            // If the user is subscribed to a specific date (Carte), render only that instance
            if ($pivotDate) {
                $data['start'] = $pivotDate . 'T' . $event->start_date->format('H:i:s');
                $data['end'] = $pivotDate . 'T' . $event->end_date->format('H:i:s');
            } 
            // If subscribed to the series (Année)
            elseif ($isCours) {
                $data['daysOfWeek'] = [$event->start_date->dayOfWeek];
                $data['startTime'] = $event->start_date->format('H:i:s');
                $data['endTime'] = $event->end_date->format('H:i:s');
                $data['startRecur'] = $event->start_date->format('Y-m-d');
            } else {
                $data['start'] = $event->start_date;
                $data['end'] = $event->end_date;
            }

            return $data;
        })->filter()->values(); // Remove nulls and re-index

        return view('my_planning', compact('events'));
    }

    public function unsubscribe(Request $request, Event $event)
    {
        $user = auth()->user();
        $adherent = $user->adherent;
        $date = $request->input('date'); // The specific date to unsubscribe from
        $subscriptionType = $request->input('subscription_type', 'unique'); // 'unique' or 'year'

        // Check for specific date subscription first (Carte or specific Annee session)
        $specificSub = $event->users()
                            ->where('user_id', $user->id)
                            ->wherePivot('date', $date)
                            ->wherePivot('is_cancelled', false)
                            ->exists();

        // Check for global subscription (Année)
        $globalSub = $event->users()
                           ->where('user_id', $user->id)
                           ->wherePivot('date', null)
                           ->exists();

        if ($subscriptionType === 'year') {
            if ($globalSub) {
                // Unsubscribe from the whole year
                // Also remove any cancellations or specific sessions for this event to clean up?
                $event->users()->detach($user->id); 
                return back()->with('success', 'Désinscription à l\'année confirmée.');
            } else {
                return back()->with('error', 'Aucune inscription à l\'année trouvée.');
            }
        } else {
            // Unsubscribe from specific session
            if ($specificSub) {
                // It's a specific entry (Carte or manually added session), just detach it
                $event->users()->wherePivot('date', $date)->detach($user->id);
                
                // Refund if carte
                if ($adherent && $adherent->formule === 'carte') {
                    $adherent->increment('value');
                }
                return back()->with('success', 'Désinscription confirmée. Crédit remboursé.');
            } 
            elseif ($globalSub) {
                // It's a yearly subscription, but we want to cancel ONE session
                // We add a cancellation record
                if (!$date) {
                    return back()->with('error', 'Date requise pour l\'annulation.');
                }
                
                // Check if already cancelled
                $alreadyCancelled = $event->users()
                                        ->where('user_id', $user->id)
                                        ->wherePivot('date', $date)
                                        ->wherePivot('is_cancelled', true)
                                        ->exists();
                
                if (!$alreadyCancelled) {
                    $event->users()->attach($user->id, [
                        'date' => $date,
                        'is_cancelled' => true
                    ]);
                }
                
                return back()->with('success', 'Séance annulée pour cette date.');
            }
            else {
                return back()->with('error', 'Inscription introuvable.');
            }
        }
    }
}
