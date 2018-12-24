
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


$( document ).ready(function() {
  $.get("/site/getcicloid",
  function (data) {
    $("#ddlCicloID").val(data);
  });
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
        else{
          location.reload();
        }
      });
  });
  $("#dynamicmodel-tocicloid").change(function () {
    if(this.value === $("#dynamicmodel-fromcicloid").val()){
      $("#dynamicmodel-tocicloid").val('');
      alert("Seleccionar distintos ciclos.")
    }
  });

  console.log( "ready!" );
});
$( this ).tooltip();
