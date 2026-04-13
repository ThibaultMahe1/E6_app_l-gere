@extends('layouts.layout')

@section('title')
Mon Planning
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h3 class="mb-4 text-primary-custom border-bottom pb-2 d-inline-block">Mon Planning</h3>
                
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
<div class="offcanvas offcanvas-end offcanvas-custom" tabindex="-1" id="eventOffcanvas" aria-labelledby="eventOffcanvasLabel">
    <div class="offcanvas-header border-bottom-primary">
        <h5 class="offcanvas-title font-heading text-secondary-custom" id="eventOffcanvasLabel">Détails de l'événement</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column">
        <h3 id="eventTitle" class="mb-4 event-title"></h3>
        
        <div class="mb-4 p-3 bg-primary-light">
            <h6 class="section-label">Détails</h6>
            <p class="mb-1"><strong>Type :</strong> <span id="eventType"></span></p>
            <p class="mb-1"><strong>Début :</strong> <span id="eventStart"></span></p>
            <p class="mb-0"><strong>Fin :</strong> <span id="eventEnd"></span></p>
        </div>

        <div class="mb-4 flex-grow-1">
            <h6 class="section-label">Description</h6>
            <p id="eventDescription" class="text-muted lh-relaxed"></p>
        </div>

        <div class="mt-auto pt-3 border-top-primary">
            <form id="unsubscribeForm" method="POST" action="">
                @csrf
                @method('DELETE')
                <input type="hidden" name="date" id="unsubscribeDate">
                
                <!-- Buttons for 'annee' subscription -->
                <button type="submit" name="subscription_type" value="unique" id="btnUnsubscribeUnique" class="btn w-100 text-white py-2 mb-2 btn-danger-bold" style="display:none">Se désinscrire de cette séance</button>
                <button type="submit" name="subscription_type" value="year" id="btnUnsubscribeYear" class="btn w-100 text-white py-2 btn-secondary-bold" style="display:none">Se désinscrire de l'année</button>

                <!-- Default button -->
                <button type="submit" name="subscription_type" value="unique" id="btnUnsubscribeDefault" class="btn w-100 text-white py-2 btn-danger-bold">Se désinscrire</button>
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
                
                // Check for 48h restriction
                var now = new Date();
                var eventDateObj = info.event.start;
                var diffMs = eventDateObj - now;
                var diffHours = diffMs / (1000 * 60 * 60);
                var isLocked = diffHours < 48; // Less than 48h or already started (negative diff)

                if (isYearly) {
                    if (btnUnique) btnUnique.style.display = 'inline-block';
                    if (btnYear) btnYear.style.display = 'inline-block';
                    if (btnDefault) btnDefault.style.display = 'none';

                    // Update Year Button (Not affected by 48h rule for cancelling the WHOLE year, presumably? Or keep consistent)
                    // Usually cancelling year sub is administrative, but let's assume it's allowed regardless of next session.
                    btnYear.disabled = false;
                    btnYear.textContent = "Se désinscrire de l'année";
                    btnYear.classList.remove('btn-secondary');
                    btnYear.classList.add('btn-primary-custom');

                    // Update Unique Button
                    if (isLocked) {
                        btnUnique.disabled = true;
                        btnUnique.textContent = "Trop tard (< 48h)";
                        btnUnique.style.backgroundColor = '#6c757d'; // Grey
                        btnUnique.style.borderColor = '#6c757d';
                    } else {
                        btnUnique.disabled = false;
                        btnUnique.textContent = "Se désinscrire de cette séance";
                        btnUnique.style.backgroundColor = '#dc3545'; // Red
                        btnUnique.style.borderColor = '#dc3545';
                    }

                } else {
                    if (btnUnique) btnUnique.style.display = 'none';
                    if (btnYear) btnYear.style.display = 'none';
                    if (btnDefault) btnDefault.style.display = 'block';

                    if (isLocked) {
                        btnDefault.disabled = true;
                        btnDefault.textContent = "Trop tard (< 48h)";
                        btnDefault.style.backgroundColor = '#6c757d';
                        btnDefault.style.borderColor = '#6c757d';
                    } else {
                        btnDefault.disabled = false;
                        btnDefault.textContent = "Se désinscrire";
                        btnDefault.style.backgroundColor = '#dc3545';
                        btnDefault.style.borderColor = '#dc3545';
                    }
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
@endsection
