$(function(){
    $(document).on('click','.fc-minor', function(){
        var date = $(this).attr('data-date');
        $.get('/restri/create',{'date':date}, function(data){
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
$(function(){
    $(document).on('click','.fc-day', function(){
        var date = $(this).attr('data-date');
        $.get('/restri/create',{'date':date}, function(data){
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
