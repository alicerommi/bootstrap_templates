 // Developed By: http://binary6.pk/ 
 //  Email: sami@binary6.pk, rehman@binary6.pk
 //  Mobile Number: +92335 6050509
 //  Mobile Number: +92331 8207979
  $(document).ready(function(){
      //  on submitting the form
      $(document).on('submit','form',function(e){
         $.ajax({
              cache: false,
              contentType: false,
              processData: false,
              data: new FormData($('form')[0]),
              url:'actions/insert.php',
              method:'post',
              dataType:'json',
              success:function(d){
                if(d.success==1){
                  $("#error_form").empty().append('<div class="alert alert-success text-center" style="font-weight:600;">'+d.msg+'</div>');
                  $("#service_request")[0].reset();
                }else {
                     $("#error_form").empty().append('<div class="alert alert-warning text-center" style="font-weight:600;">'+d.msg+'</div>');
                }
              }
         });
         e.preventDefault();
      });


});