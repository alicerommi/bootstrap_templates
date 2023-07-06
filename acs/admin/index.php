<?php
    include 'includes/header.php';
?>                 
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">

                             <?php
                                    messages("Welcome To ACS Admin portal!","success");

                                        $total_positions  = mysqli_num_rows(mysqli_query($conn,"select* from career_postions"));

                                                           // this is the initail balance
                                                        echo '<div class="col-sm-6 col-lg-3">
                                                                <div class="mini-stat clearfix bx-shadow bg-white">
                                                                    <div class="mini-stat-info text-right text-dark">
                                                                     <span class="counter text-dark">'.$total_positions.'</span>
                                                                            <a href="careers_positions.php">Total Career Positions</a>
                                                                    </div>
                                                                </div>
                                                            </div>';   
                                                                     $total_posted_jobs  = mysqli_num_rows(mysqli_query($conn,"select* from careers"));
                                                          echo '<div class="col-sm-6 col-lg-3">
                                                                <div class="mini-stat clearfix bx-shadow bg-white">
                                                                    <div class="mini-stat-info text-right text-dark">
                                                                     <span class="counter text-dark">'.$total_posted_jobs.'</span>
                                                                            <a href="all_jobs.php">Total Posted Jobs</a>
                                                                    </div>
                                                                </div>
                                                            </div>'; 

                                                            $now = date("Y-m-d");
                                                            $sql ="SELECT * FROM `careers` where career_expiry_date>='$now'";
                                                            $active_jobs= mysqli_num_rows(mysqli_query($conn,$sql));
                                                            // $totalVisitors  = mysqli_num_rows(mysqli_query($conn,"select* from visitors"));
                                                          echo '<div class="col-sm-6 col-lg-3">
                                                                <div class="mini-stat clearfix bx-shadow bg-white">
                                                                    <div class="mini-stat-info text-right text-dark">
                                                                     <span class="counter text-dark">'.$active_jobs.'</span>
                                                                            <a href="all_jobs.php">Total Active Posted Jobs</a>
                                                                    </div>
                                                                </div>
                                                            </div>';

                                                            $sql ="SELECT * FROM `careers` where career_expiry_date<='$now'";
                                                            $expire_jobs= mysqli_num_rows(mysqli_query($conn,$sql));
                                                          //   $totalmsgs  = mysqli_num_rows(mysqli_query($conn,"select* from user_messages"));
                                                          echo '<div class="col-sm-6 col-lg-3">
                                                                <div class="mini-stat clearfix bx-shadow bg-white">
                                                                    <div class="mini-stat-info text-right text-dark">
                                                                     <span class="counter text-dark">'.$expire_jobs.'</span>
                                                                            <a href="all_jobs.php">Total Expired Jobs </a>
                                                                    </div>
                                                                </div>
                                                            </div>';


                                                          $total_applications  = mysqli_num_rows(mysqli_query($conn,"select* from job_applications"));
                                                          echo '<div class="col-sm-6 col-lg-3">
                                                                <div class="mini-stat clearfix bx-shadow bg-white">
                                                                    <div class="mini-stat-info text-right text-dark">
                                                                     <span class="counter text-dark">'.$total_applications.'</span>
                                                                            <a href="#">Total Job Applications </a>
                                                                    </div>
                                                                </div>
                                                            </div>';

                                                            $total_msgs  = mysqli_num_rows(mysqli_query($conn,"select* from contact"));
                                                          echo '<div class="col-sm-6 col-lg-3">
                                                                <div class="mini-stat clearfix bx-shadow bg-white">
                                                                    <div class="mini-stat-info text-right text-dark">
                                                                     <span class="counter text-dark">'.$total_msgs.'</span>
                                                                            <a href="all_messages.php">Total Contact Messages </a>
                                                                    </div>
                                                                </div>
                                                            </div>';

                                            $total_customer_requestss  = mysqli_num_rows(mysqli_query($conn,"select* from service_requests"));
                                                          echo '<div class="col-sm-6 col-lg-3">
                                                                <div class="mini-stat clearfix bx-shadow bg-white">
                                                                    <div class="mini-stat-info text-right text-dark">
                                                                     <span class="counter text-dark">'.$total_customer_requestss.'</span>
                                                                            <a href="request_messages.php">Total Customer Requests </a>
                                                                    </div>
                                                                </div>
                                                            </div>';
                            ?>
                    </div> 
                </div> 
            </div>
</div>
<?php
    include 'includes/footer.php';
?>