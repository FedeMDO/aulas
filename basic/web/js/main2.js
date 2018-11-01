$(document).ready(function(){
    $('#calendar').fullCalendar({
        //VIEW
        header: {
            left: 'today prev,next',
            center: 'title',
            right: 'agendaDay,agendaWeek,month'
        },
        defaultView:'agendaWeek',
        lang: 'es-us',
        minTime: '08:00:00',
        maxTime: '23:00:00',
        height: 'auto',
        nowIndicator: true,
        slotDuration: '01:00:00',
        //EVENTOS
        eventSources: [
            {
                url: '/evento/jsoncalendar', // use the `url` property
                type: 'GET',
                data: {
                    id: function(){
                        return $("em").text()
                    },
                },
            }
        ],
        //licencia scheduler
        schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',

        eventRender: function(event){
            return (event.ranges.filter(function(range){ // test event against all the ranges

                return (event.start.isBefore(range.end) &&
                    event.end.isAfter(range.start));

            }).length)>0; //if it isn't in one of the ranges, don't render it (by returning false)
        },
        eventResize: function(event, delta, revertFunc) {
            var id =event.id;
            var ini=event.start.format();
            var fin=event.end.format();

            if (!confirm("Confirmar cambios")) {
                revertFunc();}
            else
            {
                $.post("/evento/upd",
                    {
                        id:id,
                        ini:ini,
                        fin:fin,
                    },
                    function(data)
                    {
                        if (data){
                            alert("se actulaizo bien");
                        }
                        else {
                            alert("error");
                        }
                    });
            }},
        eventReceive: function(event){
            alert("Por favor elija un intervalo de horas");
            var id=event.id;
            var inicio=event.start.format();
            var id_aula =$("em").text();

        },
        eventClick: function(event){
            var id = event.id;
            var inicio = event.start.format();
            var fin = event.end.format();
            var id_aula = $("em").text();
            if (!confirm("Guardar cambios en base de datos?")){
                $.post("/evento/upd2",
                    {
                        id:id,
                        ini:inicio,
                        fin:fin,
                        id_aula:id_aula
                    });
            }
            else{
                revertFunc();
            }
        },
        eventDrop: function( event, delta, revertFunc, jsEvent, ui, view ) {

            var id =event.id;
            var ini=event.start.format();
            var fin=event.end.format();

            if (!confirm("Esta seguro??")) {
                revertFunc();}
            else
            {
                $.post("/evento/upd",
                    {
                        id:id,
                        ini:ini,
                        fin:fin
                    },
                    function(data)
                    {
                        if (data){
                            alert("se actulaizo conrrectamente");
                        }
                        else {
                            alert("error");
                        }
                });
            }}

    });
});
