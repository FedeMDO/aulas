
$(function () {
    $(document).on('click', '.showModalButton', function () {
        if ($('#modalEvento').data('bs.modal').isShown) {
            $('#modalEvento').find('#modalContent')
                .load($(this).attr('value'));
            $('#modalHeader').hide();

        } else {
            //if modal isn't open; open it and load content
            $('#modalEvento').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
            //dynamiclly set the header for the modal
            $('#modalHeader').hide();
        }
    });
});
$('#btnBorrarEvento').click(function () {
    let idEvento = parseInt($('#idevento').val());
    let tipoEvento = $('#tipo').val();
    var id_aula = $("em").text();

    if (confirm("¿Esta seguro?")) {
        if (tipoEvento == 'periodico') {
            $.post("/evento/delete",
                {
                    id: idEvento,
                    id_aula: id_aula,
                },
            )
        }
        else if (tipoEvento == 'especial') {
            $.post("/especialcalendar/delete",
                {
                    id: idEvento,
                    id_aula: id_aula,
                },
            )
        }
        $('#myModal').hide();
    }
    else {
        revertFunc();
    }
})

      