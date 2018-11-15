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
