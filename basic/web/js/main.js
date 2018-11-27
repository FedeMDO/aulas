
$(function () {
    $('[data-toggle="popover"]').popover()
  })

$(function(){
    $('#modalButton').click(function(e){
        e.preventDefault();
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('href'));
    });
});

$(function(){
  $('#modalLogin').click(function(e){
      e.preventDefault();
      $('#modal').modal('show')
      .find('#modalContent')
      .load($(this).attr('value'));
  });
});

const btnToggle = document.querySelector('.toggle-btn');
btnToggle.addEventListener('click', function () {
document.getElementById("sidebar").classList.toggle('active');});

$(document).ready(function(){
    $("#sidebar").click(function(){
      if ($(this).hasClass('active')){
        $(".col-sm-8").css({"left": "0px", "transition": "all 500ms linear"});
      }else{
        $(".col-sm-8").css({"left": "200px", "transition": "all 500ms linear"});
      }
    });
  });
