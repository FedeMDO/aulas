$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        columnDefs: [
            {
                targets: [0,1,2,3,4,5,6,7,8,9],
                className: 'dt-center'
            }
          ]
    } );
} );