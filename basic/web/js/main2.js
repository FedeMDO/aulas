 /*$(function(){
     $(document).on('click', function(){
         var date = $(this).attr('data-date');
         $.get('jajaj',{'date':date}, function(data){
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
        
});*/
$(function(){

    $(document).on('click','.fc-day', function(){
        var date = $(this).attr('data-date');
        
      var date2 =$('em').text();
        $.get('/restri/create',{'date':date,'date2':date2}, function(data){
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
        
});