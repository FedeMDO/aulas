
 $(document).ready(function() {
    $("#checkNoInstituto").click(function() {
      if ($(this).is(":checked")) {
         $("#formregister-idinstituto").prop("disabled", true);
      } else {
         $("#formregister-idinstituto").prop("disabled", false);  
      }
    });
   });