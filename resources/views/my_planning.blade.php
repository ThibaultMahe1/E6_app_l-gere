@extends('layouts.layout')

@section('title')
Mon Planning
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h3 class="mb-4 text-primary-custom border-bottom pb-2 d-inline-block">{{ __('Mon Planning') }}</h3>
                
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
            <form id="unsubscribeForm" method="POST" action="">
                @csrf
                @method('DELETE')
                <input type="hidden" name="date" id="unsubscribeDate">
                
                <!-- Buttons for 'annee' subscription -->
                <button type="submit" name="subscription_type" value="unique" id="btnUnsubscribeUnique" class="btn w-100 text-white py-2 mb-2" style="background-color: #dc3545; font-weight: bold; display: none;">Se désinscrire de cette séance</button>
                <button type="submit" name="subscription_type" value="year" id="btnUnsubscribeYear" class="btn w-100 text-white py-2" style="background-color: #340604; font-weight: bold; display: none;">Se désinscrire de l'année</button>

                <!-- Default button -->
                <button type="submit" name="subscription_type" value="unique" id="btnUnsubscribeDefault" class="btn w-100 text-white py-2" style="background-color: #dc3545; font-weight: bold;">Se désinscrire</button>
            </form>
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

                // Set Form Action
                var form = document.getElementById('unsubscribeForm');
                var baseUrl = "{{ url('/planning') }}";
                form.action = baseUrl + '/' + info.event.id + '/unsubscribe';

                // Set date input
                var dateInput = document.getElementById('unsubscribeDate');
                if (dateInput && info.event.start) {
                    var year = info.event.start.getFullYear();
                    var month = ('0' + (info.event.start.getMonth() + 1)).slice(-2);
                    var day = ('0' + info.event.start.getDate()).slice(-2);
                    dateInput.value = year + '-' + month + '-' + day;
                }

                // Handle Buttons Visibility
                var btnUnique = document.getElementById('btnUnsubscribeUnique');
                var btnYear = document.getElementById('btnUnsubscribeYear');
                var btnDefault = document.getElementById('btnUnsubscribeDefault');
                
                var isYearly = info.event.extendedProps.isYearly;

                if (isYearly) {
                    if (btnUnique) btnUnique.style.display = 'inline-block';
                    if (btnYear) btnYear.style.display = 'inline-block';
                    if (btnDefault) btnDefault.style.display = 'none';
                } else {
                    if (btnUnique) btnUnique.style.display = 'none';
                    if (btnYear) btnYear.style.display = 'none';
                    if (btnDefault) btnDefault.style.display = 'block';
                }

                // Show Offcanvas
                var myOffcanvas = new bootstrap.Offcanvas(document.getElementById('eventOffcanvas'));
                myOffcanvas.show();
            },
            eventDidMount: function(info) {
                // Hide cancelled dates for yearly subscriptions
                if (info.event.extendedProps.isYearly && info.event.extendedProps.cancelledDates) {
                    var eventDate = info.event.start;
                    var year = eventDate.getFullYear();
                    var month = ('0' + (eventDate.getMonth() + 1)).slice(-2);
                    var day = ('0' + eventDate.getDate()).slice(-2);
                    var dateStr = year + '-' + month + '-' + day;

                    if (info.event.extendedProps.cancelledDates.includes(dateStr)) {
                        info.el.style.display = 'none';
                    }
                }
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
