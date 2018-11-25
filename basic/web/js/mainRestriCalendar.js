//MAIN VISTA CALENDARIO DE RESTRICCIONES
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
                url: '/restri/jsoncalendar', // use the `url` property
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
                $.post("/restri/upd",
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
            if(esUserGuest == "false"){
                if(startDate.isoWeekday() != endDate.isoWeekday()){
                    alert("Por ahora no se permiten eventos que duren mas un dia");
                    return;
                }
    
                let url = "/restri/create?id_aula=" + $("em").text();
                $("#modalRestriContent").load(url, function () {
                $("#modalRestri").modal("show");
                //DIA
                $('#restricalendar-dow').val(startDate.isoWeekday());
    
                //HORA INI
                $('#restricalendar-hora_ini').val(startDate.format('HH:mm:ss'));
                
                //HORA FIN
                $('#restricalendar-hora_fin').val(endDate.format('HH:mm:ss'));
                
                $("#restricalendar-hora_ini option[value='22:00:00']").remove();
                $("#restricalendar-hora_fin option[value='08:00:00']").remove();
                });  
            }
        },

        selectAllow: function(selectInfo){
            let currentView  = $('#calendar').fullCalendar('getView');
            if(currentView.name === 'month'){
                return false;
            }
            return true;
        },

        eventClick: function(event){
            if(!event.ajeno){
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
                $('#myModal').find('#idevento').val(event.id.replace('R', ''));
            }
            
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
            $.post("/restri/upd",
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
$(function(){
    $(document).on('click', '.showModalButton', function(){
      if ($('#modalRestri').data('bs.modal').isShown) {
          $('#modalRestri').find('#modalRestriContent')
                  .load($(this).attr('value'));
          document.getElementById('modalRestriHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
          $('#modalRestriHeader').hide();
      } else {
          //if modal isn't open; open it and load content
          $('#modalRestri').modal('show')
                  .find('#modalRestriContent')
                  .load($(this).attr('value'));
           //dynamiclly set the header for the modal
          document.getElementById('modalRestriHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
          $('#modalRestriHeader').hide();
      }
  });
});

$('#btnBorrarEvento').click(function()
{
  let idEvento = parseInt($('#idevento').val());
  var id_aula = $("em").text();
  
  if (confirm("¿Esta seguro?")) 
  {
      $.post("/restri/delete",
      {
          id: idEvento,
          id_aula: id_aula,
      },
      )
      $('#myModal').hide();
  }
  else{
      revertFunc();
  }
})
var esUserGuest;
$.get( "/user/currentuserisguest", function( data ) {
    esUserGuest = data;
})