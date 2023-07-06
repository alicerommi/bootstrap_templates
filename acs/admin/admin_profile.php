<?php
        include 'includes/header.php';
?>                    
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                <div class="wraper container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="bg-picture text-center" style="background-image:url('assets/images/big/bg.jpg')">
                                <div class="bg-picture-overlay"></div>
                                <div class="profile-info-name">
                                    <img src="<?php echo $admin_pic; ?>" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                    <h3 class="text-white"><?php echo $admin_name;?></h3>
                                </div>
                            </div>
                            <!--/ meta -->
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-lg-12" style="    margin-top: 20px;"> 
                                <?php
                                        if(isset($_GET['updated'])){
                                                    if($_GET['updated']==1){
                                                        echo '<div class="alert alert-success">Admin profile has been updated successfully.</div>';
                                                    }else if($_GET['updated']==0){
                                                          echo '<div class="alert alert-warning">Error in updating admin profile.</div>';
                                                    }
                                        }
                                              if(isset($_GET['uploadErr'])){
                                                    if($_GET['uploadErr']==0){
                                                              echo '<div class="alert alert-warning">Error in uploading the image.</div>';
                                                    }
                                              }  
                                              if(isset($_GET['invalidFormat'])){
                                                        if($_GET['invalidFormat']==0){
                                                                echo '<div class="alert alert-warning">The image format is not valid (use these formats: png,jpg,jpeg)</div>';
                                                        }
                                              }

                                              if(isset($_GET['passmismatch'])){
                                                if($_GET['passmismatch']==1)
                                                     echo '<div class="alert alert-danger">Both Passwords are Mismatched</div>';
                                              }

                                ?>
                                <div class="row">
                                                              
                                <div class="col-md-12">
                                          <div class="panel panel-default panel-fill">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Edit Your Profile</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <div id = "updateErr"></div>
                                        <form role="form" method="post" id="updateAdminUpdate" action = "actions/update.php" enctype="multipart/form-data">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Update Image</label>
                                                    <input type="file" name="image" id="image" class="form-control">
                                            </div>
                                            <input type="hidden" value="<?php echo $admin_id; ?>" name="admin_id">
                                            <div class="form-group">
                                                <label for="FullName">Full Name</label>
                                                <input type="text" value="<?php echo $admin_name; ?>" id="FullName" name="FullName" class="form-control"  required>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email">Email</label>
                                                <input type="email" value="<?php echo $admin_email; ?>" id="Email" name="Email" class="form-control" readonly >
                                            </div>
                                             
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Password">Password</label>
                                                <input type="password" placeholder="6 - 15 Characters" id="Password" name="Password" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="RePassword">Re-Password</label>
                                                <input type="password" placeholder="6 - 15 Characters" id="RePassword" name="RePassword" class="form-control" required>
                                            </div>
                                         
                                        </div>
                                          <div class="form-group text-right">
                                            <button class="btn btn-primary waves-effect waves-light w-md text-right" type="submit" name="saveProfiel">Save</button>
                                        </div>
                                        </form>

                                    </div> 
                                </div>

                                </div>
                            </div> 
                        </div> 
                    </div>
                    </div>
                </div> <!-- container -->
                               
                </div> <!-- content -->
<?php
            include 'includes/footer.php';
?>
<script type="text/javascript">
    $(document).ready(function(){
            $(document).on('focusout','#RePassword',function(){
                        var confirm_pass = $(this).val();
                        var pass = $("#Password").val();
                        if(pass.length>6){
                                if(pass!=confirm_pass){
                                      $("#updateErr").empty().append('<div class="alert alert-warning">Both passwords are mismatched.</div>');
                                      $(this).val("");          
                                }
                        }else{
                            $("#updateErr").empty().append('<div class="alert alert-warning">Password length must be greater than 6</div>');
                                 $(this).val(""); 
                        }
                                setTimeout(function(){
                                           $("#updateErr").empty();
                                },20000);
                            });
    });
</script>