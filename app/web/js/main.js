$.get("/site/getcicloid",
function (data) {
    $("#ddlCicloID").val(data);
});
$(document).ready(function () {

    $("#ddlCicloID").change(function () {
        var ciclo = this.value;
        $.post("/site/ciclosession",
            {
                cicloID: ciclo,
            },
            function (data) {
                if (!data) {
                    alert("error");
                }
                else {
                    location.reload();
                }
            });
    });
    $("#dynamicmodel-tocicloid").change(function () {
        if (this.value === $("#dynamicmodel-fromcicloid").val()) {
            $("#dynamicmodel-tocicloid").val('');
        }
    });
});

$(function () {
    $('[data-toggle="popover"]').popover()
})

$(function () {
    $('#modalButton').click(function (e) {
        e.preventDefault();
        $('#modal').modal('show')
            .find('#modalContent')
            .load($(this).attr('href'));
    });
});

$(function () {
    $('#modalLogin').click(function (e) {
        e.preventDefault();
        $('#modal').modal('show')
            .find('#modalContent')
            .load($(this).attr('value'));
    });
});



