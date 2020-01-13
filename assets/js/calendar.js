document.addEventListener('DOMContentLoaded', function() {
    var initialLocaleCode = 'pt-br';
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        //defaultDate: '2019-08-12',
        locale: initialLocaleCode,
        editable: false,
        navLinks: true, // can click day/week names to navigate views
        eventLimit: true, // allow "more" link when too many events
        events: {
            url: './assets/fullcalendar/php/get-events.php',
        }
    });

    calendar.render();
});