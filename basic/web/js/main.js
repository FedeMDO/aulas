// $(function(){
//     $(document).on('click','.fc-minor', function(){
//         var date = $(this).attr('data-date');
//         $.get('/evento/create',{'date':date}, function(data){
//             $('.modal').modal('show')
//             .find('#modelContent')
//             .html(data);
//         });
//     });
//     $('#modelButton').click(function(){
//         $('.modal').modal('show')
//             .find('#modelContent')
//             .load($(this).attr('value'));
//     });
        
// });



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

$(function(){

    $(document).on('click','.fc-day', function(){
        var date = $(this).attr('data-date');
        
      var date2 =$('em').text();
        $.get('/evento/create',{'date':date,'date2':date2}, function(data){
            $('.modal').modal('show')
            .find('#modelContent')
            .html(data);
        });
    });
    $('#modelButton').click(function(){
       
        $('.modal').modal('show')
            .find('#modelContent')
            .load($(this).attr('value'));
    });
        
}

);
