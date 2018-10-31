$(document).ready(function(){
    $('#calendar').fullCalendar({
        header: {
            left: 'today prev,next',
            center: 'title',
            right: 'timelineDay,timelineWeek'
        },
        defaultView:'timelineDay',
        lang: 'es-us',
        minTime: '08:00:00',
        maxTime: '23:00:00',
        schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
        height: 'auto',

        resourceGroupField: 'edificio',
        resourceAreaWidth: '23%',
        resourceRender: function resourceRenderCallback(resourceObj, labelTds, bodyTds){
            var title = 'Recursos: ' + '\n' + resourceObj.recursos;
            labelTds.attr('title', title);
        },
        resources:

            // your event source
            {
                url: '/evento/jsonresources',
                type: 'GET',
                data: {
                    id_sede: $("em").text(),
                }
            },
        // use the `url` property
        resourcesInitiallyExpanded:true,
        eventSources: [

            // your event source
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
        
            // any other sources...
        
          ],
        resourceLabelText: 'Aula por edificio',
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
            var aula_id= event.resourceId;
            
            if (!confirm("Confirmar cambios")) {
                revertFunc();}
                else
                {
                    $.post("/evento/updscheduler",
                        { 
                            id:id,
                            ini:ini,
                            fin:fin,
                            aula_id:aula_id,
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
            var id_aula =event.resourceId;
            
          },
        eventOverlap: function(stillEvent, movingEvent) {
            return stillEvent.rendering == "background";
        },
        eventClick: function(event){
            var id = event.id;
            var inicio = event.start.format();
            var fin = event.end.format();
            var id_aula = event.resourceId;
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
            var aula_id = event.resourceId;
            
            if (!confirm("Esta seguro??")) {
                revertFunc();}
                else
                {
                    $.post("/evento/updscheduler",
                { 
                    id:id,
                    ini:ini,
                    fin:fin,
                    aula_id:aula_id,
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
