
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
