<?php
            include 'actions/session_check.php';
            include '../includes/database_connection.php';
            include 'alert_messages.php';
              function human_timedate($date){
                   $time=substr ($date,11);
                    $time_in_12_hour_format  = date("g:i a", strtotime($time));
                    $dt = trim(substr($date,0,10)); 
                    list($year,$month,$day) = explode("-",$dt);
                    $finalDate = $day."/".$month."/".$year;
                    $time_date = $finalDate." ".$time_in_12_hour_format;
                    return $time_date; 
              } 
?>
<!-- Developed By: http://binary6.pk/ 
  Email: sami@binary6.pk, rehman@binary6.pk
  Mobile Number: +92335 6050509
  Mobile Number: +92331 8207979
-->
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
       <title>Ac's || Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="Ac's Mechanical services, Inc." name="description" />
        <meta content="Binary6" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="assets/images/favicon.png">
        <!-- Custom Files -->
        <!--venobox lightbox-->
        <link rel="stylesheet" href="assets/plugins/magnific-popup/dist/magnific-popup.css">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css">
              <link href="assets/plugins/colorpicker/colorpicker.css" rel="stylesheet" type="text/css">
        <link href="assets/plugins/jquery-multi-select/multi-select.css" rel="stylesheet" type="text/css">
        <link href="assets/plugins/select2/dist/css/select2.css" rel="stylesheet" type="text/css">
        <link href="assets/plugins/select2/dist/css/select2-bootstrap.css" rel="stylesheet" type="text/css">
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css">
        <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
         <!-- Plugins css -->
        <link href="assets/plugins/modal-effect/css/component.css" rel="stylesheet">
        <script src="assets/js/modernizr.min.js"></script>
        <style>
.actions_messages{
font-weight:600;}
</style>
    </head>

    <?php
                                          //getting the admin info
                                             $admin_email = $_SESSION['acs_AdminSession'];
                                      //  $admin_timeLogin =    $_SESSION['travelAdminSession_time'];
                                          $AdminQuery = mysqli_query($conn,"select* from admin where admin_email='$admin_email'");
                                          $row = mysqli_fetch_array($AdminQuery);
                                          $admin_name = ucwords($row['admin_name']);
                                            $admin_id = $row['admin_id'];
                                        $admin_pic = $row['admin_pic'];
                                            if(strlen($admin_pic)==0){
                                                    $admin_pic = "assets/images/users/dummy.png";
                                            }else {
                                                    $admin_pic = "assets/images/users/".$admin_pic;
                                            }
                                            $admin_email = $row['admin_email'];

    ?>
    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.php" class="logo"><span>ACS</span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button type="button" class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                       

                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="<?php echo $admin_pic; ?>" alt="Administrator Picture" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $admin_name; ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="admin_profile.php"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                                  <!--   <li><a href="admin_profile.php"><i class="md md-settings"></i> Settings</a></li> -->
                                
                                    <li><a href="logout.php"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0">Administrator</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="index.php" class="waves-effect"><i class="md md-home"></i><span> Home </span></a>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-list"></i><span> Careers </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                     <li><a href="careers_positions.php">Career Positions</a></li>
                                    <li><a href="post_a_job.php">Post A New Job</a></li>
                                    <li><a href="all_jobs.php">All Posted Job</a></li>
                                </ul>
                            </li>

                          
<!-- 
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-bookmark"></i> <span> Testimonials </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add_testimonal.php">Add Testimonial</a></li>   
                                    <li><a href="all_testimonals.php">All Testimonial</a></li>
                                </ul>
                            </li> -->



                               
<!-- 
                            <li>
                                        <a href="social_media_links.php"><i class="md md-poll"></i><span>Social Media Links</span></a>
                            </li> -->

                               <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-envelope"></i><span>Messages</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                      <li><a href="all_messages.php">Contact Us Messages</a></li>
                                       <li><a href="request_messages.php">Request Messages</a></li>                                
                                </ul>
                            </li>
                         <!--     <li>
                                <a href="login_activities.php" class="waves-effect"><i class="fa fa-bars"></i><span>  Login Activities </span></a>
                            </li> -->
                            <li>
                                <a href="logout.php" class="waves-effect"><i class="md md-settings-power"></i><span> Logout </span></a>
                            </li>
                          
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->