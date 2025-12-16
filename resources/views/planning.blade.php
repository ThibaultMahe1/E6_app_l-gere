@extends('layouts.layout')

@section('title')
Planning
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h3 class="mb-4 text-primary-custom border-bottom pb-2 d-inline-block">{{ __('Planning des Événements') }}</h3>
                
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('info'))
                    <div class="alert alert-info">
                        {{ session('info') }}
                    </div>
                @endif

                <div id='calendar'></div>
            </div>
        </div>
    </div>
</div>

<!-- Event Offcanvas (Sidebar) -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="eventOffcanvas" aria-labelledby="eventOffcanvasLabel" style="background-color: #fdfbf7; border-left: 4px solid #bf9b6e;">
    <div class="offcanvas-header" style="border-bottom: 1px solid #bf9b6e;">
        <h5 class="offcanvas-title" id="eventOffcanvasLabel" style="font-family: 'Cinzel', serif; color: #340604;">Détails de l'événement</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column">
        <h3 id="eventTitle" class="mb-4" style="color: #bf9b6e; font-family: 'Cinzel', serif;"></h3>
        
        <div class="mb-4 p-3" style="background-color: rgba(191, 155, 110, 0.1); border-radius: 5px;">
            <h6 style="color: #340604; font-weight: bold; text-transform: uppercase; font-size: 0.9rem;">Détails</h6>
            <p class="mb-1"><strong>Type :</strong> <span id="eventType"></span></p>
            <p class="mb-1"><strong>Début :</strong> <span id="eventStart"></span></p>
            <p class="mb-0"><strong>Fin :</strong> <span id="eventEnd"></span></p>
        </div>

        <div class="mb-4 flex-grow-1">
            <h6 style="color: #340604; font-weight: bold; text-transform: uppercase; font-size: 0.9rem;">Description</h6>
            <p id="eventDescription" class="text-muted" style="line-height: 1.6;"></p>
        </div>

        <div class="mt-auto pt-3" style="border-top: 1px solid #bf9b6e;">
            @auth
                @php
                    $user = Auth::user();
                    $hasFormule = $user->adherent && $user->adherent->formule;
                @endphp
                <form id="subscribeForm" method="POST" action="">
                    @csrf
                    <input type="hidden" name="date" id="subscribeDate">
                    @if($hasFormule)
                        <!-- Buttons for 'annee' formula (hidden by default, toggled by JS) -->
                        <button type="submit" name="subscription_type" value="unique" id="btnSubscribeUnique" class="btn w-100 text-white py-2 mb-2" style="background-color: #bf9b6e; font-weight: bold; display: none;">S'inscrire à cette séance</button>
                        <button type="submit" name="subscription_type" value="year" id="btnSubscribeYear" class="btn w-100 text-white py-2" style="background-color: #340604; font-weight: bold; display: none;">S'inscrire à l'année</button>
                        
                        <!-- Default button for 'carte' formula -->
                        <button type="submit" name="subscription_type" value="unique" id="btnSubscribeDefault" class="btn w-100 text-white py-2" style="background-color: #bf9b6e; font-weight: bold;">S'inscrire à l'événement</button>
                    @else
                        <button type="button" class="btn w-100 text-white py-2" style="background-color: #6c757d; font-weight: bold;" disabled>Aucune formule active</button>
                        <p class="text-center text-muted small mt-2">Contactez le club pour activer une formule.</p>
                    @endif
                </form>
            @else
                <a href="{{ route('login') }}" class="btn w-100 text-white py-2" style="background-color: #bf9b6e; font-weight: bold;">Se connecter pour s'inscrire</a>
            @endauth
        </div>
    </div>
</div>

<!-- FullCalendar CSS -->
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'fr',
            height: '80vh',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            buttonText: {
                today: "Aujourd'hui",
                month: 'Mois',
                week: 'Semaine',
                day: 'Jour',
                list: 'Liste'
            },
            events: @json($events),
            eventColor: '#bf9b6e', // Default event color
            eventTextColor: '#ffffff',
            eventClick: function(info) {
                // Populate Offcanvas
                document.getElementById('eventTitle').textContent = info.event.title;
                document.getElementById('eventType').textContent = info.event.extendedProps.type || 'Aucun';
                document.getElementById('eventDescription').textContent = info.event.extendedProps.description || 'Aucune description';
                
                // Format dates
                const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
                document.getElementById('eventStart').textContent = info.event.start ? info.event.start.toLocaleDateString('fr-FR', options) : '';
                document.getElementById('eventEnd').textContent = info.event.end ? info.event.end.toLocaleDateString('fr-FR', options) : '';

                // Update Subscribe Form Action and Date
                const subscribeForm = document.getElementById('subscribeForm');
                if (subscribeForm) {
                    subscribeForm.action = `/planning/${info.event.id}/subscribe`;
                    
                    const dateInput = document.getElementById('subscribeDate');
                    if (dateInput && info.event.start) {
                        // Format date as YYYY-MM-DD for the backend
                        const year = info.event.start.getFullYear();
                        const month = String(info.event.start.getMonth() + 1).padStart(2, '0');
                        const day = String(info.event.start.getDate()).padStart(2, '0');
                        dateInput.value = `${year}-${month}-${day}`;
                    }
                }

                // Set Form Action and Button State
                @auth
                    var form = document.getElementById('subscribeForm');
                    if (form) {
                        var hasFormule = @json(Auth::user()->adherent && Auth::user()->adherent->formule);
                        var formuleType = @json(Auth::user()->adherent ? Auth::user()->adherent->formule : null);
                        
                        var baseUrl = "{{ url('/planning') }}";
                        form.action = baseUrl + '/' + info.event.id + '/subscribe';

                        // Reset buttons visibility
                        var btnUnique = document.getElementById('btnSubscribeUnique');
                        var btnYear = document.getElementById('btnSubscribeYear');
                        var btnDefault = document.getElementById('btnSubscribeDefault');

                        if (hasFormule) {
                            // Check subscription status
                            var isSubscribedGlobally = info.event.extendedProps.subscribedGlobally;
                            var subscribedDates = info.event.extendedProps.subscribedDates || [];
                            
                            // Format current date YYYY-MM-DD
                            var currentDate = null;
                            if (info.event.start) {
                                var year = info.event.start.getFullYear();
                                var month = ('0' + (info.event.start.getMonth() + 1)).slice(-2);
                                var day = ('0' + info.event.start.getDate()).slice(-2);
                                currentDate = year + '-' + month + '-' + day;
                            }
                            var isSubscribedSpecific = currentDate && subscribedDates.includes(currentDate);
                            
                            console.log('Event Click Debug:', {
                                eventDate: currentDate,
                                subscribedDates: subscribedDates,
                                isSubscribedSpecific: isSubscribedSpecific,
                                isSubscribedGlobally: isSubscribedGlobally
                            });

                            if (formuleType === 'annee') {
                                // Show dual buttons
                                if (btnUnique) btnUnique.style.display = 'inline-block';
                                if (btnYear) btnYear.style.display = 'inline-block';
                                if (btnDefault) btnDefault.style.display = 'none';

                                // Update Year Button
                                if (isSubscribedGlobally) {
                                    btnYear.disabled = true;
                                    btnYear.textContent = "Inscrit à l'année";
                                    btnYear.classList.add('btn-secondary');
                                    btnYear.classList.remove('btn-primary-custom');
                                } else {
                                    btnYear.disabled = false;
                                    btnYear.textContent = "S'inscrire à l'année";
                                    btnYear.classList.remove('btn-secondary');
                                    btnYear.classList.add('btn-primary-custom');
                                }

                                // Update Unique Button
                                if (isSubscribedSpecific || isSubscribedGlobally) {
                                    btnUnique.disabled = true;
                                    btnUnique.textContent = isSubscribedGlobally ? "Inclus (Année)" : "Déjà inscrit";
                                    btnUnique.classList.add('btn-secondary');
                                    btnUnique.classList.remove('btn-primary-custom');
                                } else {
                                    btnUnique.disabled = false;
                                    btnUnique.textContent = "S'inscrire à cette séance";
                                    btnUnique.classList.remove('btn-secondary');
                                    btnUnique.classList.add('btn-primary-custom');
                                }

                            } else {
                                // Carte or other: Show default button
                                if (btnUnique) btnUnique.style.display = 'none';
                                if (btnYear) btnYear.style.display = 'none';
                                if (btnDefault) btnDefault.style.display = 'block';

                                if (isSubscribedSpecific) {
                                    btnDefault.disabled = true;
                                    btnDefault.textContent = "Déjà inscrit";
                                    btnDefault.style.backgroundColor = '#6c757d';
                                    btnDefault.style.borderColor = '#6c757d';
                                    btnDefault.style.cursor = 'not-allowed';
                                } else {
                                    btnDefault.disabled = false;
                                    btnDefault.textContent = "S'inscrire à l'événement";
                                    btnDefault.style.backgroundColor = '#bf9b6e';
                                    btnDefault.style.borderColor = '#bf9b6e';
                                    btnDefault.style.cursor = 'pointer';
                                }
                            }
                        }
                    }
                @endauth

                // Show Offcanvas
                var myOffcanvas = new bootstrap.Offcanvas(document.getElementById('eventOffcanvas'));
                myOffcanvas.show();
            }
        });
        calendar.render();
    });
</script>

<style>
    /* Custom Calendar Styling to match theme */
    :root {
        --fc-border-color: #bf9b6e;
        --fc-button-text-color: #fff;
        --fc-button-bg-color: #bf9b6e;
        --fc-button-border-color: #bf9b6e;
        --fc-button-hover-bg-color: #a6855a;
        --fc-button-hover-border-color: #a6855a;
        --fc-button-active-bg-color: #340604;
        --fc-button-active-border-color: #340604;
        --fc-event-bg-color: #bf9b6e;
        --fc-event-border-color: #bf9b6e;
        --fc-today-bg-color: rgba(191, 155, 110, 0.15);
    }

    .fc-toolbar-title {
        font-family: 'Cinzel', serif !important;
        color: #340604;
    }

    .fc-col-header-cell-cushion {
        color: #340604;
        text-decoration: none;
        font-family: 'Cinzel', serif;
    }

    .fc-daygrid-day-number {
        color: #340604;
        text-decoration: none;
    }

    /* Remove blue links */
    a {
        color: inherit;
        text-decoration: none;
    }
</style>
@endsection
