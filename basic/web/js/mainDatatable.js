$('#btnBuscar').click(function () {
    $('#example').DataTable().clear();
    $('#example').DataTable().destroy();
    let idCarrera = $('#carrera-id option:selected').text();
    let idCiclo = parseInt($('#ciclolectivo-id').val());

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
})