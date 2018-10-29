$(document).ready(function(){
    $('#calendar').fullCalendar({
        header: {
            left: 'today prev,next',
            center: 'title',
            right: 'timelineDay,timelineWeek'
        },
        defaultView:'timelineDay',
        lang: 'es-us',
        weekends: true, // will hide Saturdays and Sundays
        editable: true,
        droppable: true,
        selectable: true,
        minTime: '08:00:00',
        maxTime: '23:00:00',
        schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
        height: 'auto',
        // events: [
        //     {
        //       title: 'Event Title1',
        //       start: '13:13:55.008',
        //       end: '16:13:55.008',
        //       dow: [ 1, 2, 3, 4 ]
        //     },
        //     {
        //       title: 'Event Title2',
        //       start: '2018-10-20T13:13:55-0400',
        //       end: '2018-10-20T16:13:55-0400'
        //     }
        // ],
        resourceGroupField: 'edificio',
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
        resourcesInitiallyExpanded:false,
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
            var id_aula =event.resourceId;
            
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
