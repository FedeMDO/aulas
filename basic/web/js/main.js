$(document).ready(function(){
    $('#calendar').fullCalendar({
        //VIEW
        header: {
            left: 'today prev,next',
            center: 'title',
            right: 'timelineDay,timelineWeek'
        },
        defaultView:'timelineDay',
        selectable: true,
        lang: 'es-us',
        minTime: '08:00:00',
        maxTime: '23:00:00',
        height: 'auto',
        nowIndicator: true,
        selectMinDistance : 15, //el usuario tiene que mover al menos 15 pixeles el mouse para seleccionar
        slotDuration: '01:00:00',
        //SCHEDULER
        schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
        resourceGroupField: 'edificio',
        resourceAreaWidth: '23%',
        resourceRender: function resourceRenderCallback(resourceObj, labelTds, bodyTds){
            var title = 'Recursos: ' + '\n' + resourceObj.recursos;
            labelTds.attr('title', title);
        },
        resources:
            {
                url: '/evento/jsonresources',
                type: 'GET',
                data: {
                    id_sede: $("em").text(),
                }
            },
        resourcesInitiallyExpanded:true,
        resourceLabelText: 'Aula por edificio',
        //EVENTOS
        eventSources: [
            {
              url: '/evento/jsonschedulersede', // use the `url` property
              type: 'GET',
                data: {
                    id_sede: $("em").text(),
                },
                error: function() {
                    alert('there was an error while fetching events!');
                },
            }
        ],
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
            var aula_id= event.resourceId;
            var dow = event.start.isoWeekday();
            
            if (!confirm("Confirmar cambios")) {
                revertFunc();
            }
                else
                {
                    $.post("/evento/updscheduler",
                        { 
                            id:id,
                            ini:ini,
                            fin:fin,
                            aula_id:aula_id,
                            dow: dow
                        },
            function(data)
            {
                if (!data){
                    alert("error");
                }
            });
          }},

        eventReceive: function(event){
            alert("Por favor elija un intervalo de horas");
            var id=event.id;
            var inicio=event.start.format();
            var id_aula =event.resourceId;
            
        },

        eventOverlap: function(stillEvent, movingEvent) {
            return stillEvent.rendering == "background";
        },

        select: function(startDate, endDate, jsEvent, view, resource ) {
                
            if(startDate.isoWeekday() != endDate.isoWeekday()){
                alert("Por ahora no se permiten eventos que duren mas un dia");
                return;
            }

            let url = "/evento/create?id_aula=" + resource.id;
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
            	
            $.get( "/user/getunamebyid", 
                { id: event.usermodifico },
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
            $('#myModal').find('#idevento').val(event.id.replace('R', ''));
        },

        eventDrop: function( event, delta, revertFunc, jsEvent, ui, view ) { 

            var id =event.id;
            var ini=event.start.format();
            var fin=event.end.format();
            var aula_id = event.resourceId;
            
            if (!confirm("Esta seguro??")) {
                revertFunc();}
                else{
                    $.post("/evento/updscheduler",
                { 
                    id:id,
                    ini:ini,
                    fin:fin,
                    aula_id:aula_id,
                },
                function(data){
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
      if ($('#modal').data('bs.modal').isShown) {
          $('#modal').find('#modalContent')
                  .load($(this).attr('value'));
          document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
          $('#modalHeader').hide();
      } else {
          //if modal isn't open; open it and load content
          $('#modal').modal('show')
                  .find('#modalContent')
                  .load($(this).attr('value'));
           //dynamiclly set the header for the modal
          document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
          $('#modalHeader').hide();
      }
  });
});

$('#btnBorrarEvento').click(function()
{
  let idEvento = parseInt($('#idevento').val());
  var id_sede = $("em").text();
  
  if (confirm("¿Esta seguro?")) 
  {
      $.post("/evento/delete",
      {
          id: idEvento,
          id_sede: id_sede,
          scheduler: 1
      },
      )
      $('#myModal').hide();
  }
  else{
      revertFunc();
  }
})