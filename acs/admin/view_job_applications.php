<?php
		include 'includes/header.php';
?>
	<div class="content-page">
                <div class="content">
                    <div class="container">
                         <div class="row">
                             <div class=" col-md-12 text-right guidebtn">
                                        <a class="btn btn-lg btn-purple" href="all_jobs.php"><i class="fa fa-list"></i> View All Jobs</a>
                                </div>
                            <div class="col-md-12">
                              
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">All Posted Jobs</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                          <?php
                                            if(isset($_GET['deleted'])){
                                              if($_GET['deleted']==1)
                                                   messages("Deleted Successfully","danger");
                                            }
                                          ?>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="db" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                          
                                                            <th>Applicant Name</th>
                                                            <th>Email</th>
                                                          
															<th>Phone</th>  
                                                            <!-- <th>Last Date To Apply</th>  -->   
                                                            <th>Date</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <?php 
                                                            $career_id = $_GET['job_id'];
                                                                // $i=0;
                                                                $query = mysqli_query($conn,"SELECT * FROM `job_applications` where career_id=$career_id");
                                                                while($row= mysqli_fetch_array($query)){

                                                                   $applicant_name= $row['applicant_name'];
                                                                    $applicant_email_address= $row['applicant_email_address'];
                                                                    $applicant_phone= $row['applicant_phone'];
                                                                    $applicant_brief_description= $row['applicant_brief_description'];
                                                                   // $applied_datetime= $row['applied_datetime'];
                                                                    $applicant_cv= $row['applicant_cv'];
                                                                    $applied_datetime = human_timedate($row['applied_datetime']);
                                                                        $job_apply_id = $row['job_apply_id'];

                                                                        $actions = '<a class="btn btn-info" target="_blank" href="../uploads/job_cvs/'.$applicant_cv.'" title="View Applicant CV"><i class="fa fa-file"></i></a> <button title="About Applicant" class="btn btn-purple btn_view" id="'.intval($job_apply_id).'"><i class="fa fa-eye"></i></button>';
                                                                        $abc= '<input type="hidden" value="'.$applicant_brief_description.'" id="details'.$job_apply_id.'">';
                                                                          echo '<tr id="">
                                                                            
                                                                            <td>'.$applicant_name.$abc.'</td>
                                                                            <td>'.$applicant_email_address.'</td>
                                                                            <td>'.$applicant_phone.'</td>
                                                                              <td>'.$applied_datetime.'</td>
                                                                            <td>'.$actions.'</td>
                                                                        </tr>';
                                                                }
                                                                   
                                                            ?>
                                                      
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Row -->


                   

<?php
		include 'includes/footer.php';
?>
<script type="text/javascript">
        $(document).on('click','.btn_view',function(){
            let id = $(this).attr('id');
            let details = $("#details"+id).val();
            $("#modalData").empty().append(details);
            $("#myLargeModalLabel").html("Read About Applicant");
            $("#customMODAL").modal('show');
        });
</script>