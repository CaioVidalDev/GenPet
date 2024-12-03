<div>

    <div id="calendario"></div>

</div>

@assets
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@event-calendar/build@3.7.0/event-calendar.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@event-calendar/build@3.7.0/event-calendar.min.js"></script>
@endassets

@script
    <script>
        const ec = new EventCalendar(document.getElementById('calendario'), {
            view: @json($defaultMode),
            events: @json($events),
            editable: true,
            locale: 'pt-br',
            headerToolbar: {
                start: 'prev,next today',
                center: 'title',
                end: 'dayGridMonth timeGridWeek timeGridDay listMonth'
            },
            buttonText: {
                today: 'Hoje',
                prev: 'Anterior',
                next: 'Próximo',
                dayGridMonth: 'Mês',
                timeGridWeek: 'Semana',
                timeGridDay: 'Dia',
                listMonth: 'Lista',
            },
           
            eventBackgroundColor: '#6161B3',
            eventTextColor: '#FFFFFF',
            allDayContent: 'Dia Inteiro',
            allDaySlot: false,

            dateClick: function(info) {

                $wire.dispatch('create-evento', {
                    date: info.dateStr
                });
            },

            eventClick: function(info) {

                $wire.dispatch('edit-evento', {
                    id: info.event.id
                });
            },

            eventDrop: function(info) {
                $wire.dispatch('drop-evento', {
                    id: info.event.id,
                    start: info.event.start,
                    end: info.event.end
                });
            },

            eventResize: function(info) {
                $wire.dispatch('resize-evento', {
                    id: info.event.id,
                    start: info.event.start,
                    end: info.event.end
                });
            },

        });

        $wire.on('event-updated', ({ id, title, start, end }) => {
            ec.updateEvent({
                id: id,
                title: title,
                start: start,
                end: end
            });
        });

        $wire.on('event-created', ({ id, title, start, end }) => {
            ec.addEvent({
                id: id,
                title: title,
                start: start,
                end: end
            });
        });

        $wire.on('event-deleted', ({ id }) => {
            ec.removeEventById(id);
        });

        
       $wire.on('atualizarCalendarioFiltrado', (eventos) => {
            console.log(eventos);
   
        });

    </script>
@endscript
