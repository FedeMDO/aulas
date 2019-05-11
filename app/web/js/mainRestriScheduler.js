//MAIN VISTA SCHEDULER DE RESTRICCIONES
$(document).ready(function () {
    $('#loading-image').bind('ajaxStart', function(){
        $(this).show();
    }).bind('ajaxStop', function(){
        $(this).hide();
    });
    $('#calendar').fullCalendar({
        themeSystem: 'bootstrap4',
        //VIEW
        header: {
            left: 'today prev,next',
            center: 'title',
            right: 'timelineDay,timelineWeek'
        },
        loading: function(bool){
            $("#LoadingImage").show();
        },
        eventAfterAllRender: function (view) {
            $("#LoadingImage").hide();
        },
        defaultView: 'timelineWeek',
        selectable: true,
        lang: 'es-us',
        minTime: '08:00:00',
        maxTime: '22:00:00',
        hiddenDays: [0],
        height: 'auto',
        nowIndicator: true,
        selectMinDistance: 15, //el usuario tiene que mover al menos 15 pixeles el mouse para seleccionar
        slotDuration: '01:00:00',
        //SCHEDULER
        schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
        resourceGroupField: 'edificio',
        resourceColumns: [
            {
              labelText: 'Edificio',
              field: 'edificio'
            },
            {
              labelText: 'Capacidad',
              field: 'capacidad'
            }
          ],
        resourceAreaWidth: '23%',
        resourceRender: function (resourceObj, $th, $body) {
            var title = 'Recursos: ' + '\n' + resourceObj.recursos;
            var first_text = $th.find('.fc-cell-text').first();
            first_text.text('');
            first_text.append('<a href=' + resourceObj.url + '>' + resourceObj.title + '</a>');
            first_text.attr('title', title);
        },
        resources:
        {
            url: '/restri/jsonresources',
            type: 'GET',
            data: {
                id_sede: $("em").text(),
            }
        },
        resourcesInitiallyExpanded: true,
        resourceLabelText: 'Aula por edificio',
        //EVENTOS
        eventSources: [
            {
                url: '/restri/jsonschedulersede', // use the `url` property
                type: 'GET',
                data: {
                    id_sede: $("em").text(),
                },
                error: function () {
                    alert('there was an error while fetching events!');
                },
            }
        ],
        eventRender: function (event) {
            return (event.ranges.filter(function (range) { // test event against all the ranges

                return (event.start.isBefore(range.end) &&
                    event.end.isAfter(range.start));

            }).length) > 0; //if it isn't in one of the ranges, don't render it (by returning false)
        },

        selectOverlap: function (event) {
            return event.rendering === 'background';
        },

        eventResize: function (event, delta, revertFunc) {
            var id = event.id;
            var ini = event.start.format();
            var fin = event.end.format();
            var aula_id = event.resourceId;
            var dow = event.start.isoWeekday();

            if (!confirm("Confirmar cambios")) {
                revertFunc();
            }
            else {
                $.post("/restri/updscheduler",
                    {
                        id: id,
                        ini: ini,
                        fin: fin,
                        aula_id: aula_id,
                        dow: dow
                    },
                    function (data) {
                        if (!data) {
                            alert("error");
                        }
                    });
            }
        },

        eventOverlap: function (stillEvent, movingEvent) {
            return stillEvent.rendering == "background";
        },

        select: function (startDate, endDate, jsEvent, view, resource) {
            if (esUserGuest == "false") {
                if (startDate.isoWeekday() != endDate.isoWeekday()) {
                    alert("Por ahora no se permiten eventos que duren mas un dia");
                    return;
                }

                let url = "/restri/create?id_aula=" + resource.id + "&sch=true";
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

        selectAllow: function (selectInfo) {
            let currentView = $('#calendar').fullCalendar('getView');
            if (currentView.name === 'month') {
                return false;
            }
            return true;
        },

        eventClick: function (event) {
            if (!event.ajeno) {
                let inicio = event.start.format('DD-MM-YYYY HH:mma').replace(" ", " a las ");
                let fin = event.end.format('DD-MM-YYYY HH:mma').replace(" ", " a las ");
                let dowIni = function () {
                    return dows[event.start.isoWeekday()] + ' ' + inicio;
                }
                let dowFin = function () {
                    return dows[event.end.isoWeekday()] + ' ' + fin;
                }

                $.get("/user/getunamebyid",
                    { id: event.usermodifico },
                    function (data) {
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

        eventDrop: function (event, delta, revertFunc, jsEvent, ui, view) {

            var id = event.id;
            var ini = event.start.format();
            var fin = event.end.format();
            var aula_id = event.resourceId;
            var dow = event.start.isoWeekday();

            if (!confirm("Esta seguro?")) {
                revertFunc();
            }
            else {
                $.post("/restri/updscheduler",
                    {
                        id: id,
                        ini: ini,
                        fin: fin,
                        aula_id: aula_id,
                        dow: dow
                    },
                    function (data) {
                        if (data) {

                        }
                        else {
                            alert("Error");
                        }
                    });
            }
        }
    });
});
var dows = {
    1: 'Lunes',
    2: 'Martes',
    3: 'Miercoles',
    4: 'Jueves',
    5: 'Viernes',
    6: 'Sabado',
    7: 'Domingo'
}


$(function () {
    $(document).on('click', '.showModalButton', function () {
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

$('#btnBorrarEvento').click(function () {
    let idEvento = parseInt($('#idevento').val());
    var id_sede = $("em").text();

    if (confirm("¿Esta seguro?")) {
        $.post("/restri/delete",
            {
                id: idEvento,
                id_sede: id_sede,
                scheduler: 1
            },
        )
        $('#myModal').hide();
    }
    else {
        revertFunc();
    }
})
var esUserGuest;
$.get("/user/currentuserisguest", function (data) {
    esUserGuest = data;
})