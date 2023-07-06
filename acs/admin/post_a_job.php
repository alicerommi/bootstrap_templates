<?php 
            include 'includes/header.php';
?> 
            <div class="content-page">
                <div class="content">
                    <div class="container">
                         <div class="row">
                                 <div class=" col-md-12 text-right guidebtn">
                                        <a class="btn btn-lg btn-info" href="all_jobs.php"><i class="fa fa-eye"></i> View All Posted Jobs</a>
                                </div>
                            <div class="col-md-12">
                                <?php
                                  if(isset($_GET['added'])){
                                            if($_GET['added'])
                                                messages("Added Successfully","success");
                                        }
                                ?>
                                
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Post A Job</h3>
                                    </div>
                                    <div class="panel-body">
                                                <form method="post" id="" action="actions/insert.php" >
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                    <label>Job Title</label>
                                                                    <input type="text" name="job_title" required class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                    <label>Job Position</label>
                                                                    <select class="form-control" name="career_position">
                                                                    <?php
                                                                      $query = mysqli_query($conn,"select* from career_postions");
                                                                      while($row = mysqli_fetch_array($query)){
                                                                         $career_postion_id = $row['career_postion_id'];
                                                                     $career_postion_name = $row['career_postion_name'];
                                                                        echo '<option value="'.$career_postion_id.'">'.ucwords($career_postion_name).'</option>';
                                                                }//end while
                                                                echo '</select>';
                                                                    ?>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Job Type</label>
                                                                <select name="job_type" class="form-control">
                                                                        <option value="Full Time">Full Time</option>
                                                                        <option value="Part Time">Part Time</option>
                                                                </select>
                                                            </div>



                                                             <div class="form-group">
                                                                    <label>Job Country</label>
                                                                    <input type="text" name="job_country" required class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                    <label>Job City</label>
                                                                    <input type="text" name="job_city" required class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                    <label>Apply Last Date</label>
                                                                    <input type="date" name="job_last_date" required class="form-control">
                                                            </div>




                                                    </div>
                                                           

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Education (Qualification) Required This Job?</label>
                                                                <input type="text" name="job_qual" class="form-control" required>
                                                            </div>

                                                             <div class="form-group">
                                                                    <label>Minimum Salary</label>
                                                                    <input type="number" name="mini_sal" required  class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                    <label>Maximum Salary</label>
                                                                    <input type="number" name="max_sal" required  class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Experience</label>
                                                                <input type="text" name="job_ex" required class="form-control">
                                                            </div>

                                                               <div class="form-group">
                                                                <label>Job Description</label>
                                                                <textarea class="form-control" name="job_des"  required  rows="5" id=""></textarea>
                                                            </div> 


                                                                <div class="form-group text-right">    
                                                                        <button class="btn btn-success" name="add_job" type="submit">Save</button>
                                                                </div>

                                                </form>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Row -->

<?php 
                    include  'includes/footer.php';
?>
