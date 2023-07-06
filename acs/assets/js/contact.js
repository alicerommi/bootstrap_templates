 // Developed By: http://binary6.pk/ 
 //  Email: sami@binary6.pk, rehman@binary6.pk
 //  Mobile Number: +92335 6050509
 //  Mobile Number: +92331 8207979
  $(document).ready(function(){
      //  on submitting the form
      $(document).on('submit','#field-contact',function(e){
        // alert("asd");
         $.ajax({
              data: $(this).serialize(),
              url:'actions/insert.php',
              method:'post',
              dataType:'json',
              success:function(d){
                if(d.success==1){
                  $("#error_form").empty().append('<div class="alert alert-success text-center" style="font-weight:600;">'+d.msg+'</div>');
                  $("#field-contact")[0].reset();
                }else {
                     $("#error_form").empty().append('<div class="alert alert-warning text-center" style="font-weight:600;">'+d.msg+'</div>');
                }
              }
         });
         e.preventDefault();
      });
});