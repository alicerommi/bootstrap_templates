<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<!--          Developed By: http://binary6.pk/ 
 Email: sami@binary6.pk, rehman@binary6.pk
   Mobile Number: +92335 6050509
   Mobile Number: +92331 8207979 -->
        <meta charset="utf-8" />
         <title>ACS Admin Panel || Login Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="Binary6 Software House http://Binary6.pk" name="description" />
        <meta content="Binary6" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="assets/images/favicon.png">
        <!-- Custom Files -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css">
        <script src="assets/js/modernizr.min.js"></script>        
    </head>
    <body>
        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"> Sign In to <strong>Admin Panel</strong> </h3>
                </div> 


                <div class="panel-body">
                    <?php
                            if(isset($_GET['wrong'])){
                                        if($_GET['wrong']==1){
                                            echo '<div class="alert alert-danger">You have entered wrong details.</div>';
                                        }
                            }
                    ?>
                <form class="form-horizontal m-t-20" action="actions/authentication.php" method="post">
                    
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" name="adminName" type="text" required="" placeholder="Enter Your Email" >
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="password" name="adminPass" required="" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit" name="loginAdmin">Log In</button>
                        </div>
                    </div>
                </form> 
                </div>                                 
                
            </div>
        </div>

        
    	<script>
            var resizefunc = [];
        </script>
        <!-- Main  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.app.js"></script>
	</body>
</html>