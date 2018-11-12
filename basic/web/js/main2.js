$(document).ready(function(){
    $('#calendar').fullCalendar({
        //VIEW
        header: {
            left: 'today prev,next',
            center: 'title',
            right: 'agendaDay,agendaWeek,month'
        },
        defaultView:'agendaWeek',
        selectable: true,
        lang: 'es-us',
        minTime: '08:00:00',
        maxTime: '23:00:00',
        hiddenDays: [0],
        height: 'auto',
        nowIndicator: true,
        slotDuration: '01:00:00',
        allDaySlot: false,
        selectMinDistance : 15, //el usuario tiene que mover al menos 15 pixeles el mouse para seleccionar
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

        selectOverlap: function(event) {
            return event.rendering === 'background';
        },

        eventResize: function(event, delta, revertFunc) {
            var id =event.id;
            var ini=event.start.format();
            var fin=event.end.format();
            var dow = event.start.isoWeekday();

            if (!confirm("Confirmar cambios")) {
                revertFunc();}
            else
            {
                $.post("/evento/upd",
                    {
                        id: id,
                        ini: ini,
                        fin: fin,
                        dow: dow
                    },
                    function(data)
                    {
                        if (!data){
                            alert("error");
                        }
                    });
            }},

        select: function(startDate, endDate) {
                
                if(startDate.isoWeekday() != endDate.isoWeekday()){
                    alert("Por ahora no se permiten eventos que duren mas un dia");
                    return;
                }

            let url = "/evento/create?id_aula=" + $("em").text();
            $("#modalContent").load(url, function () {
            $("#modal").modal("show");
            //DIA
            $('#eventocalendar-dow').val(startDate.isoWeekday());

            //HORA INI
            $('#eventocalendar-hora_ini').val(startDate.format('HH:mm:ss'));
            
            //HORA FIN
            $('#eventocalendar-hora_fin').val(endDate.format('HH:mm:ss'));
            
            $('#carrera-id').val('');
            });  
        },

        selectAllow: function(selectInfo){
            let currentView  = $('#calendar').fullCalendar('getView');
            if(currentView.name === 'month'){
                return false;
            }
            return true;
        },

        eventClick: function(event){
            
            let inicio = event.start.format('DD-MM-YYYY HH:mma').replace(" ", " a las ");
            let fin = event.end.format('DD-MM-YYYY HH:mma').replace(" ", " a las ");
            let dowIni = function(){
                return dows[event.start.isoWeekday()] + ' ' + inicio;
            }
            let dowFin = function(){
                return dows[event.end.isoWeekday()] + ' ' + fin;
            }
            	
            $.get( "/user/getunamebyid", { id: event.usermodifico} ,
                function(data)
                {
                    $('#myModal').find('#showusermodifico').text(data);
                }
            );
            $('#myModal').modal('show');
            $('#myModal').find('#showcomision').text(event.title);
            $('#myModal').find('#showini').text(dowIni);
            $('#myModal').find('#showfin').text(dowFin);
            $('#myModal').find('#idevento').val(event.id.replace('E', '')); //amoldar para q funcione con restris
            
        },

        eventDrop: function( event, delta, revertFunc, jsEvent, ui, view ) {

            var id =event.id;
            var ini=event.start.format();
            var fin=event.end.format();
            var dow = event.start.isoWeekday();

            if (!confirm("Esta seguro??")) {
                revertFunc();}
            else
            {
                $.post("/evento/upd",
                    {
                        id: id,
                        ini: ini,
                        fin: fin,
                        dow: dow
                    },
                    function(data)
                    {
                        if (!data){
                            alert("error");
                        }
                });
            }}

    });
});
var dows = {1: 'Lunes', 
2: 'Martes',
3: 'Miercoles',
4: 'Jueves',
5: 'Viernes',
6: 'Sabado',
7: 'Domingo'
}
