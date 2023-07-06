<?php
		include 'includes/header.php';
?>
	<div class="content-page">
                <div class="content">
                    <div class="container">
                         <div class="row">
                             <div class=" col-md-12 text-right guidebtn">
                                        <a class="btn btn-lg btn-purple" href="post_a_job.php"><i class="fa fa-plus"></i> Post A New Job</a>
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
                                                          
                                                            <th>Job Title</th>
                                                            <th>Position</th>
                                                          
															<th>Posted Date</th>  
                                                            <th>Last Date To Apply</th>    
                                                            <th>Status</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <?php 
                                                                // $i=0;
                                                                $query = mysqli_query($conn,"SELECT * FROM `careers` join career_postions where careers.career_position_id= career_postions.career_postion_id");
                                                                while($row= mysqli_fetch_array($query)){

                                                                    $career_id = $row['career_id'];
                                                                    $career_position_id = $row['career_position_id'];
                                                                    $career_title = $row['career_title'];
                                                                    $career_description = $row['career_description'];
                                                                    $career_expiry_date = ($row['career_expiry_date']);
                                                                    $now = date("Y-m-d");
                                                                    if($now <= $career_expiry_date){
                                                                        $career_expiry_date="<span class='label label-success'>Active</span>";
                                                                    }else{
                                                                        $career_expiry_date="<span class='label label-danger'>Expired</span>";
                                                                    }
                                                                    $career_country = $row['career_country'];
                                                                    $career_city = $row['career_city'];
                                                                    $career_minimum_salary = $row['career_minimum_salary'];
                                                                    $career_maximum_salary = $row['career_maximum_salary'];
                                                                    $career_experience = $row['career_experience'];
                                                                    $career_education = $row['career_education'];
                                                                    $career_type = $row['career_type'];
                                                                    $career_added_timestamp = human_timedate($row['career_added_timestamp']);
                                                                    $career_postion_name = $row['career_postion_name'];
                                                                  

                                                                        $actions = ' <a class="btn btn-inverse"   title="Update Job Details" href="update_job.php?career_id='.$career_id.'"><i class="fa fa-pencil"></i></a> <a class="btn btn-danger" href="actions/delete.php?delete_job=1&job_id='.$career_id.'" title="Delete This Job"><i class="fa fa-times"></i></a>';
                                                                        
                                                                        $aaa ='';
                                                                        $check_app = mysqli_query($conn,"select* from job_applications where career_id=$career_id");
                                                                        if(mysqli_num_rows($check_app)>0){
                                                                            $aaa =' <a href="view_job_applications.php?job_id='.$career_id.'" class="btn btn-info" title="View Job Applications"> <i class="fa fa-list"></i></a>';
                                                                        }

                                                                          echo '<tr id="">
                                                                            
                                                                            <td>'.$career_title.'</td>
                                                                            <td>'.ucwords($career_postion_name).'</td>
                                                                            <td>'.$career_added_timestamp.'</td>
                                                                              <td>'.date("d-m-Y",strtotime($row['career_expiry_date'])).'</td>
                                                                              <td>'.$career_expiry_date.'</td>

                                                                             
                                                                            <td>'.$actions.$aaa.'</td>
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