
$(document).ready(function () {
   $("#checkNoInstituto").click(function () {
      if ($(this).is(":checked")) {
         $("#formregister-idinstituto").prop("disabled", true);
         $("#formregister-idinstituto").val('');
         //Seleccione un instituto...
      } else {
         $("#formregister-idinstituto").prop("disabled", false);
      }
   });
});