$(document).ready(function () {
    $('#calendar').fullCalendar({
        themeSystem:'bootstrap4',
        //VIEW
        header: {
            left: 'today prev,next',
            center: 'title',
            right: 'agendaDay,agendaWeek,month'
        },
        columnHeaderFormat: 'ddd D/M',
        defaultView: 'agendaWeek',
        selectable: true,
        lang: 'es-us',
        minTime: '08:00:00',
        maxTime: '22:00:00',
        timeFormat: 'H:mm',
        hiddenDays: [0], // Domingo escondido
        height: 'auto',
        nowIndicator: true,
        slotDuration: '01:00:00',
        slotLabelFormat: 'H:mm',
        allDaySlot: false,
        eventLimit: 4,
        dayPopoverFormat: 'dddd DD [de] MMMM', // ej lunes 26 de noviembre 
        selectMinDistance: 15, //el usuario tiene que mover al menos 15 pixeles el mouse para seleccionar
        //EVENTOS
        eventSources: [
            {
                url: '/evento/jsoncalendar', // use the `url` property
                type: 'GET',
                data: {
                    id: function () {
                        return $("em").text()
                    },
                },
            },
            {
                url: '/especialcalendar/jsoncalendar', // use the `url` property
                type: 'GET',
                data: {
                    id: function () {
                        return $("em").text()
                    },
                },
            }
        ],
        //licencia scheduler
        schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',

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

            if (!confirm("Confirmar cambios")) {
                revertFunc();
            }
            else {
                if (!event.especial) {
                    $.post("/evento/upd",
                        {
                            id: id,
                            ini: ini,
                            fin: fin,
                            dow: dow
                        },
                        function (data) {
                            if (!data) {
                                alert("error");
                            }
                        });
                }
                else {
                    $.post("/especialcalendar/upd",
                        {
                            id: id,
                            ini: ini,
                            fin: fin,
                        },
                        function (data) {
                            if (!data) {
                                alert("error");
                            }
                        });
                }
            }
        },

        select: function (startDate, endDate) {

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
                                let url = "/evento/create?id_aula=" + $("em").text();
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
                                    $(this).dialog("close");
                                });
                                
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
                                    $(this).dialog("close");
                                });
                                
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
                let inicio = event.start.format('DD-MM-YYYY HH:mma').replace(" ", " a las ");
                let fin = event.end.format('DD-MM-YYYY HH:mma').replace(" ", " a las ");
                let dowIni = function () {
                    return dows[event.start.isoWeekday()] + ' ' + inicio;
                }
                let dowFin = function () {
                    return dows[event.end.isoWeekday()] + ' ' + fin;
                }

                $.get("/user/getunamebyid", { id: event.usermodifico },
                    function (data) {
                        $('#myModal').find('#showusermodifico').text(data);
                    }
                );
                $('#myModal').modal('show');
                $('#myModal').find('#showcomision').text(event.title);
                $('#myModal').find('#showini').text(dowIni);
                $('#myModal').find('#showfin').text(dowFin);
                $('#myModal').find('#idevento').val(event.id.replace('E', ''));
                $('#myModal').find('#tipo').val('periodico');
                if (event.especial) {
                    $('#myModal').find('#idevento').val(event.id.replace('U', ''));
                    $('#myModal').find('#tipo').val('especial');
                }
            }
        },

        eventDrop: function (event, delta, revertFunc, jsEvent, ui, view) {

            var id = event.id;
            var ini = event.start.format();
            var fin = event.end.format();
            var dow = event.start.isoWeekday();

            if (!confirm("Esta seguro??")) {
                revertFunc();
            }
            else {
                if (!event.especial) {
                    $.post("/evento/upd",
                        {
                            id: id,
                            ini: ini,
                            fin: fin,
                            dow: dow
                        },
                        function (data) {
                            if (!data) {
                                alert("error");
                            }
                        });
                }
                else {
                    $.post("/especialcalendar/upd",
                        {
                            id: id,
                            ini: ini,
                            fin: fin,
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
var esUserGuest;
$.get("/user/currentuserisguest", function (data) {
    esUserGuest = data;
})
