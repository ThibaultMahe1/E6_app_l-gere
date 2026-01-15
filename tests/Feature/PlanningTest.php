<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\EventType;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlanningTest extends TestCase
{
    use RefreshDatabase;

    public function test_planning_page_is_displayed(): void
    {
        $response = $this->get('/planning');
        $response->assertStatus(200);
    }

    public function test_user_can_view_my_planning(): void
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get('/mon-planning');
        $response->assertStatus(200);
    }

    public function test_user_can_subscribe_to_event_carte(): void
    {
        $user = User::factory()->create();
        // Adherent is created by User::booted
        $user->adherent->update(['value' => 10, 'formule' => 'carte']);
        
        $type = EventType::create(['name' => 'cours']);
        $event = Event::factory()->create([
            'start_date' => now()->addDays(5)->toDateTimeString(),
            'end_date' => now()->addDays(5)->addHour()->toDateTimeString(),
        ]);
        $event->eventTypes()->attach($type->id);

        $targetDate = $event->start_date->format('Y-m-d');

        $response = $this->actingAs($user)->post(route('planning.subscribe', $event), [
            'date' => $targetDate,
            'subscription_type' => 'unique'
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');
        
        $this->assertDatabaseHas('event_user', [
            'user_id' => $user->id,
            'event_id' => $event->id,
            'date' => $targetDate
        ]);
        
        $this->assertEquals(9, $user->adherent->fresh()->value);
    }

    public function test_user_can_unsubscribe_from_event(): void
    {
        $user = User::factory()->create();
        $user->adherent->update(['value' => 10, 'formule' => 'carte']);
        
        $type = EventType::create(['name' => 'cours']);
        $event = Event::factory()->create([
            'start_date' => now()->addDays(5)->toDateTimeString(),
            'end_date' => now()->addDays(5)->addHour()->toDateTimeString(),
        ]);
        $event->eventTypes()->attach($type->id);
        
        $targetDate = $event->start_date->format('Y-m-d');
        
        // Subscribe first
        $user->events()->attach($event->id, ['date' => $targetDate, 'is_cancelled' => false]);
        $user->adherent->decrement('value');

        $response = $this->actingAs($user)->delete(route('planning.unsubscribe', $event), [
            'date' => $targetDate
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        // Should be removed from pivoting table entirely for Carte subscription? 
        // Or marked cancelled? Logic in `unsubscribe` controller method needs checking.
        // Usually detach() is used.
        
        $this->assertDatabaseMissing('event_user', [
            'user_id' => $user->id,
            'event_id' => $event->id,
            'date' => $targetDate
        ]);

        $this->assertEquals(10, $user->adherent->fresh()->value);
    }
}
