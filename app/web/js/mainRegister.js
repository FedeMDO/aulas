
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
   $("#formregister-rol").change(function (e) {
      e.preventDefault();
      if ($("#formregister-rol option:selected").val() == 1) {

         $("#checkNoInstituto").prop("checked", false);
         $("#checkNoInstituto").prop("disabled", true);

         $('option[value=""]', $("#formregister-idinstituto")).remove();
      }
      else {
         $($("#formregister-idinstituto")).prepend('<option value>Seleccione un instituto...</option>');
         $($("#formregister-idinstituto")).val($('option:first', $("#formregister-idinstituto")).val());
         $("#checkNoInstituto").prop("checked", false);
         $("#checkNoInstituto").prop("disabled", false);
      }
   });
});