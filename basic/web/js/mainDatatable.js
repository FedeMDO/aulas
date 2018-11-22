$('#btnBuscar').click(function(){
    $('#example').DataTable().clear();
    $('#example').DataTable().destroy();
    let idCarrera = $('#carrera-id option:selected').text();
    let idCiclo = parseInt($('#ciclolectivo-id').val());
    
    var url = "http://ae930764.ngrok.io/api/ofertas/ciclo/" + idCiclo + "/carrera/" + idCarrera;

    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "ajax": url,
        
        columnDefs: [
            {
                targets: [0,1,2,3,4,5,6,7,8,9],
                className: 'dt-center'
            }
          ]
    } );
})