var eventType;

$(document).ready(function () {
    
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
        timeFormat: 'H:mm',
        hiddenDays: [0],
        height: 'auto',
        nowIndicator: true,
        selectMinDistance: 15, //el usuario tiene que mover al menos 15 pixeles el mouse para seleccionar
        slotDuration: '01:00:00',
        allDaySlot: false,
        eventLimit: 4,
        dayPopoverFormat: 'dddd DD [de] MMMM',
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
            first_text.append('<a href="http://yii.local' + resourceObj.url + '">' + resourceObj.title + '</a>');
            first_text.attr('title', title);
        },

        resources:
        {
            url: '/evento/jsonresources',
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
                url: '/evento/jsonschedulersede', // use the `url` property
                type: 'GET',
                data: {
                    id_sede: $("em").text(),
                },
                error: function () {
                    alert('there was an error while fetching events!');
                },
            },
            {
                url: '/especialcalendar/jsonschedulersede', // use the `url` property
                type: 'GET',
                data: {
                    id_sede: $("em").text(),
                },
            }
        ],
        eventRender: function (event, element, view) {

            if (!event.especial) {
                return (event.ranges.filter(function (range) { // test event against all the ranges

                    return (event.start.isBefore(range.end) &&
                        event.end.isAfter(range.start));

                }).length) > 0; //if it isn't in one of the ranges, don't render it (by returning false)
            }
            else {
                if (event.description != null) {
                    element.find('.fc-title').append('<div class="hr-line-solid-no-margin"></div><span style="font-size: 10px">' + event.description + '</span></div>');
                }
                return true;
            }
        },

        selectOverlap: function (event) {
            return event.rendering === 'background';
        },

        eventResize: function (event, delta, revertFunc) {
            var id = event.id;
            var ini = event.start.format();
            var fin = event.end.format();
            var dow = event.start.isoWeekday();
            var aula_id = event.resourceId;

            if (!confirm("Confirmar cambios")) {
                revertFunc();
            }
            else {
                if (!event.especial) {
                    $.post("/evento/updscheduler",
                        {
                            id: id,
                            ini: ini,
                            fin: fin,
                            dow: dow,
                            aula_id: aula_id
                        },
                        function (data) {
                            if (!data) {
                                alert("error");
                            }
                        });
                }
                else {
                    $.post("/especialcalendar/updscheduler",
                        {
                            id: id,
                            ini: ini,
                            fin: fin,
                            aula_id: aula_id
                        },
                        function (data) {
                            if (!data) {
                                alert("error");
                            }
                        });
                }
            }
        },

        /*eventOverlap: function(stillEvent, movingEvent) {
            return stillEvent.rendering == "background";
        }, */

        select: function (startDate, endDate, jsEvent, view, resource) {
            if (esUserGuest == "false") {
                if (startDate.isoWeekday() != endDate.isoWeekday()) {
                    alert("Por ahora no se permiten eventos que duren mas de un dia");
                    return;
                }
                $("#dialog-confirm").dialog({
                    resizable: false,
                    height: "auto",
                    width: 400,
                    modal: true,
                    buttons: {
                        "Evento periódico": {
                            click: function () {
                                let url = "/evento/create?id_aula=" + resource.id + "&sch=true";
                                $("#modalContent").load(url, function () {
                                    $("#modalEvento").modal("show");
                                    //DIA
                                    $('#eventocalendar-dow').val(startDate.isoWeekday());

                                    //HORA INI
                                    $('#eventocalendar-hora_ini').val(startDate.format('HH:mm:ss'));

                                    //HORA FIN
                                    $('#eventocalendar-hora_fin').val(endDate.format('HH:mm:ss'));

                                    $('#carrera-id').val('');

                                    $("#eventocalendar-hora_ini option[value='22:00:00']").remove();
                                    $("#eventocalendar-hora_fin option[value='08:00:00']").remove();

                                });
                                $(this).dialog("close");
                            },
                            text: 'Periódico',
                            class: 'btn btn-primary'
                        },
                        "Evento especial": {
                            click: function () {
                                let url = "/especialcalendar/create?id_aula=" + $("em").text();
                                $("#modalContent").load(url, function () {
                                    $("#modalEvento").modal("show");
                                    //FECHA INICIO
                                    $('#dynamicmodel-fecha_inicio').val(startDate.format("YYYY-MM-DD"));

                                    //HORA INI
                                    $('#dynamicmodel-hora_inicio').val(startDate.format('HH:mm:ss'));

                                    //HORA FIN
                                    $('#dynamicmodel-hora_fin').val(endDate.format('HH:mm:ss'));

                                    $('#carrera-id').val('');

                                    $("#dynamicmodel-hora_inicio option[value='22:00:00']").remove();
                                    $("#dynamicmodel-hora_fin option[value='08:00:00']").remove();

                                });
                                $(this).dialog("close");
                            },
                            text: 'Especial',
                            class: 'btn btn-primary'
                        },
                        "Cancel": {
                            click: function () {
                                $(this).dialog("close");
                            },
                            text: 'Cancelar',
                            class: 'btn btn-secondary'
                        }
                    },
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
                if (!event.especial) {
                    eventType = "normal";
                }
                else {
                    eventType = "especial";
                }
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

        eventDrop: function (event, delta, revertFunc) {
            var id = event.id;
            var ini = event.start.format();
            var fin = event.end.format();
            var dow = event.start.isoWeekday();
            var aula_id = event.resourceId;

            if (!confirm("Confirmar cambios")) {
                revertFunc();
            }
            else {
                if (!event.especial) {
                    $.post("/evento/updscheduler",
                        {
                            id: id,
                            ini: ini,
                            fin: fin,
                            dow: dow,
                            aula_id: aula_id
                        },
                        function (data) {
                            if (!data) {
                                alert("error");
                            }
                        });
                }
                else {
                    $.post("/especialcalendar/updscheduler",
                        {
                            id: id,
                            ini: ini,
                            fin: fin,
                            aula_id: aula_id
                        },
                        function (data) {
                            if (!data) {
                                alert("error");
                            }
                        });
                }
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

$('#btnBorrarEvento').click(function () {
    let idEvento = parseInt($('#idevento').val());
    var id_sede = $("em").text();

    if (confirm("¿Esta seguro?")) {
        if (eventType == "normal") {
            $.post("/evento/delete",
                {
                    id: idEvento,
                    id_sede: id_sede,
                    scheduler: 1
                },
            )
        }
        else if(eventType == "especial"){
            $.post("/especialcalendar/delete",
            {
                id: idEvento,
                id_sede: id_sede,
                scheduler: 1
            },
        )
        }
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