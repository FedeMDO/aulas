
$(function(){
    $(document).on('click', '.showModalButton', function(){
      if ($('#modal').data('bs.modal').isShown) {
          $('#modal').find('#modalContent')
                  .load($(this).attr('value'));
          document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
          $('#modalHeader').hide();
      } else {
          //if modal isn't open; open it and load content
          $('#modal').modal('show')
                  .find('#modalContent')
                  .load($(this).attr('value'));
           //dynamiclly set the header for the modal
          document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
          $('#modalHeader').hide();
      }
  });
});

$('#btnBorrarEvento').click(function()
{
  let idEvento = parseInt($('#idevento').val());
  var id_aula = $("em").text();
  
  if (confirm("¿Esta seguro?")) 
  {
      $.post("/evento/delete",
      {
          id: idEvento,
          id_aula: id_aula,
      },
      )
      $('#myModal').hide();
  }
  else{
      revertFunc();
  }
})