 // Developed By: http://binary6.pk/ 
 //  Email: sami@binary6.pk, rehman@binary6.pk
 //  Mobile Number: +92335 6050509
 //  Mobile Number: +92331 8207979
  $(document).ready(function(){
        function job_picker(){
                  $.ajax({
                    url:'actions/fetch.php',
                    method:'post',
                    data:{
                      fetch_jobs:1,
                    },
                    dataType:'json',
                    success:function(d){
                      if(d.num_of_records>0){
                        $("#num_of_records").html(d.num_of_records);
                        $("#job_listings").empty().append(d.html);
                      }
                      else{
                         $("#num_of_records").html(d.num_of_records);
                          $("#job_listings").empty().append('<div class="alert alert-danger text-center" style="font-weight: 600;">We have not posted jobs yet.</div>');
                      }
                    }//end success

                  });
        }//end job_picker fun here
      
      setTimeout(function(){
       // console.log("Wokring");
        job_picker();
      },10000);

      $(document).on('click','.apply_now',function(){
          let career_id = $(this).attr('id');
          if($("#career_id").length)
            {
                $("#career_id").remove();
                $("#field_job_input").append('<input type="hidden" id="career_id" name="career_id" value="'+career_id+'">');
            }else{
               
                $("#field_job_input").append('<input type="hidden" id="career_id" name="career_id" value="'+career_id+'">');
          }
          let career_title = $(this).attr('data-id');
           $("#error_form").empty();
          $("#exampleModalLabel").html("YOU ARE APPLYING FOR "+career_title);
          $("#exampleModal").modal('show');
      });


      $(document).on('change','#cv_document',function(){
          var image_files_extensions = ["pdf","doc","docx"];
           var video_file = document.getElementById('cv_document');
            var file = video_file.files[0];
            if($.inArray(file.name.split('.').pop().toLowerCase(), image_files_extensions) == -1) {
                              $("#cv_document").val('');
                               $(this).focus();
                                let msg = image_files_extensions.join(' ,')+' are supported';
                                $("#error_form").empty().append('<div class="alert alert-danger text-center" style="font-weight:600;">'+msg+'</div>');
                               return false;

            }else{
                 $("#error_form").empty();
            }
      });

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
                  $("#field_job_input")[0].reset();
                  setTimeout(function(){
                     $("#error_form").empty();
                    $("#exampleModal").modal('hide');
                  },10000);
                }else {
                     $("#error_form").empty().append('<div class="alert alert-warning text-center" style="font-weight:600;">'+d.msg+'</div>');
                }
              }
         });
         e.preventDefault();
      });



      $(document).on('click','.close',function(){
          $('form')[0].reset();
      });
      });