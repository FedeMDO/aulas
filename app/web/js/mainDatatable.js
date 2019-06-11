$('#btnBuscarFinales').click(function () {
    let idCarrera = $('#carrera-id option:selected').text();
    let from = $('#dynamicmodel-fecha_desde').val();
    let to = $('#dynamicmodel-fecha_hasta').val();
    if (idCarrera != "Seleccione...") {
        $('#OfertaFinales').DataTable().clear();
        $('#OfertaFinales').DataTable().destroy();
        var url = "/carrera/ofertaexamenbyparams?strCarrera=" + idCarrera + "&from=" + from + "&to=" + to;

        $('#OfertaFinales').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "ajax": url,

            columnDefs: [
                {
                    targets: [0, 1, 2, 3, 4, 5, 6, 7, 8],
                    className: 'dt-center'
                }
            ]
        });
    }
})

$('#btnBuscar').click(function () {
    let idCarrera = $('#carrera-id option:selected').text();
    let idCiclo = parseInt($('#ciclolectivo-id').val());
    if (idCarrera != "Seleccione..." && idCiclo != NaN) {
        $('#example').DataTable().clear();
        $('#example').DataTable().destroy();
        var url = "/carrera/ofertabyparams?idCiclo=" + idCiclo + "&strCarrera=" + idCarrera;

        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "ajax": url,

            columnDefs: [
                {
                    targets: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
                    className: 'dt-center'
                }
            ]
        });
    }
})

$(".form-control").change(function (e) {
    e.preventDefault();
    if($("#example").length){
        if($("#instituto-id").val() == "" || $("#carrera-id").val() == "" || $("#ciclolectivo-id").val() == ""){
            $("#btnBuscar").attr("disabled", true);
        }
        else{
            $("#btnBuscar").attr("disabled", false);
        }
    }
    else if($("#OfertaFinales").length){
        if($("#instituto-id").val() == "" || $("#carrera-id").val() == ""){
            $("#btnBuscarFinales").attr("disabled", true);
        }
        else{
            $("#btnBuscarFinales").attr("disabled", false);
        }
    }
});


jQuery.fn.dataTableExt.aTypes.push(
    function (sData) {
        var sValidStrings = 'lunes,martes,miercoles,jueves,viernes,sabado,domingo';

        if (sValidStrings.indexOf(sData.toLowerCase()) >= 0) {
            return 'weekdays-sort';
        }
        return null;
    }
);

var weekdays = new Array();
weekdays['lunes'] = 1;
weekdays['martes'] = 2;
weekdays['miercoles'] = 3;
weekdays['jueves'] = 4;
weekdays['viernes'] = 5;
weekdays['sabado'] = 6;
weekdays['domingo'] = 7;

jQuery.fn.dataTableExt.oSort['weekdays-sort-asc'] = function (a, b) {
    a = a.toLowerCase();
    b = b.toLowerCase();
    return ((weekdays[a] < weekdays[b]) ? -1 : ((weekdays[a] > weekdays[b]) ? 1 : 0));
};

jQuery.fn.dataTableExt.oSort['weekdays-sort-desc'] = function (a, b) {
    a = a.toLowerCase();
    b = b.toLowerCase();
    return ((weekdays[a] < weekdays[b]) ? 1 : ((weekdays[a] > weekdays[b]) ? -1 : 0));
};