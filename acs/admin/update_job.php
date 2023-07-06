<?php 
            include 'includes/header.php';
?> 
            <div class="content-page">
                <div class="content">
                    <div class="container">
                         <div class="row">
                                 <div class=" col-md-12 text-right guidebtn">
                                        <a class="btn btn-sm btn-inverse" href="all_jobs.php"><i class="fa fa-backward"></i> Back To Posted Jobs</a>
                                </div>
                            <div class="col-md-12">
                                <?php
                                  if(isset($_GET['updated'])){
                                            if($_GET['updated']==1)
                                                messages("Updated Successfully","success");
                                        }
                                        $career_id = $_GET['career_id'];
                                         $kkk = mysqli_query($conn,"SELECT * FROM `careers` join career_postions where careers.career_position_id= career_postions.career_postion_id and careers.career_id=$career_id");

                                                                    $row = mysqli_fetch_array($kkk);
                                                                        
                                                                    $career_position_id = $row['career_position_id'];
                                                                    $career_title = $row['career_title'];
                                                                    $career_description = $row['career_description'];
                                                                    $career_expiry_date = ($row['career_expiry_date']);
                                                                    $career_country = $row['career_country'];
                                                                    $career_city = $row['career_city'];
                                                                    $career_minimum_salary = $row['career_minimum_salary'];
                                                                    $career_maximum_salary = $row['career_maximum_salary'];
                                                                    $career_experience = $row['career_experience'];
                                                                    $career_education = $row['career_education'];
                                                                    $career_type = $row['career_type'];
                                                                    $career_added_timestamp = human_timedate($row['career_added_timestamp']);
                                                                    $career_postion_name = $row['career_postion_name'];
                                ?>
                                
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Update Job Details</h3>
                                    </div>
                                    <div class="panel-body">
                                                <form method="post" id="" action="actions/update.php" >
                                                    <div class="col-md-6">
                                                        <input type="hidden" name="career_id" value="<?=$career_id;  ?>">
                                                            <div class="form-group">
                                                                    <label>Job Title</label>
                                                                    <input type="text" name="job_title" required class="form-control" value="<?=$career_title ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                    <label>Job Position</label>
                                                                    <select class="form-control" name="career_position">
                                                                    <?php
                                                                      $query = mysqli_query($conn,"select* from career_postions");
                                                                      while($row2 = mysqli_fetch_array($query)){
                                                                         $career_postion_id = $row2['career_postion_id'];
                                                                          $career_postion_name = $row2['career_postion_name'];
                                                                         if ($career_position_id==$career_postion_id)
                                                                        echo '<option value="'.$career_postion_id.'" selected>'.$career_postion_name.'</option>';
                                                                    else
                                                                             echo '<option value="'.$career_postion_id.'">'.$career_postion_name.'</option>';
                                                                }//end while
                                                                echo '</select>';
                                                                    ?>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Job Type</label>
                                                                <select name="job_type" class="form-control">
                                                                        <option value="Full Time" <?php  if($career_type=="Full Time") echo 'selected'; ?> >Full Time</option>
                                                                        <option value="Part Time"  <?php  if($career_type=="Part Time") echo 'selected'; ?>>Part Time</option>
                                                                </select>
                                                            </div>



                                                             <div class="form-group">
                                                                    <label>Job Country</label>
                                                                    <input type="text" name="job_country" value="<?=$career_country;?>" required class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                    <label>Job City</label>
                                                                    <input type="text" name="job_city"  value="<?=$career_city;?>"  required class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                    <label>Apply Last Date</label>
                                                                    <input type="date" name="job_last_date" value="<?=$career_expiry_date ?>" required class="form-control">
                                                            </div>




                                                    </div>
                                                           

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Education (Qualification) Required This Job?</label>
                                                                <input type="text" name="job_qual" value="<?=$career_education ?>" class="form-control" required>
                                                            </div>

                                                             <div class="form-group">
                                                                    <label>Minimum Salary</label>
                                                                    <input type="number" name="mini_sal" value="<?= $career_minimum_salary ?>" required  class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                    <label>Maximum Salary</label>
                                                                    <input type="number" name="max_sal" required  value="<?= $career_maximum_salary ?>" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Experience</label>
                                                                <input type="text" name="job_ex" required class="form-control" value="<?=$career_experience?>">
                                                            </div>

                                                               <div class="form-group">
                                                                <label>Job Description</label>
                                                                <textarea class="form-control" name="job_des"  required  rows="5" id=""><?=$career_description?></textarea>
                                                            </div> 


                                                                <div class="form-group text-right">    
                                                                        <button class="btn btn-success" name="update_job" type="submit">Update Details</button>
                                                                </div>

                                                </form>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Row -->

<?php 
                    include  'includes/footer.php';
?>
