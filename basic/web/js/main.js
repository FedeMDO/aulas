$(document).ready(function(){
    $('#calendar').fullCalendar({
        defaultView:'agendaWeek',
        lang: 'es-us',
        weekends: true, // will hide Saturdays and Sundays
        editable: true,
        droppable: true,
        minTime: '08:00:00',
        maxTime: '23:00:00',
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
        eventSources: [

            // your event source
            {
              url: '/evento/jsoncalendar', // use the `url` property
              type: 'GET',
              data: {
                id: function(){
                    return $("em").text()
                },
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
            var id_aula =$("em").text();
            
          },
        eventClick: function(event){
            var id = event.id;
            var inicio = event.start.format();
            var fin = event.end.format();
            var id_aula = $("em").text();
            if (!confirm("Guardar cambios en base de datos?")){
              revertFunc();
            }
            else{
              $.post("/evento/upd2",
              {
                  id:id,
                ini:inicio,
                fin:fin,
                id_aula:id_aula
              });
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


    $(document).on('click','.fc-day', function(){
        var date = $(this).attr('data-date');
        
      var id_aula =$('em').text();
        $.get('/evento/create',{'date':date,'id_aula':id_aula}, function(data){
            $('.modal').modal('show')
            .find('#modelContent')
            .html(data);
        });
    });

    $('#modelButton').click(function(){
       
        $('.modal').modal('show')
            .find('#modelContent')
            .load($(this).attr('value'));
    });
