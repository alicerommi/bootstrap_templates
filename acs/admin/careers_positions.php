<?php 
            include 'includes/header.php';
?>        

     <link href="assets/plugins/summernote/dist/summernote.css" rel="stylesheet">
            <div class="content-page">
                <div class="content">
                    <div class="container">
                      
                         <div class="row">

                                    <?php
                                        if(isset($_GET['added'])){
                                            if($_GET['added'])
                                                messages("Added Successfully","success");
                                        }

                                        if(isset($_GET['deleted'])){
                                            if($_GET['deleted'])
                                                messages("Deleted Successfully","danger");
                                        }
                                    ?>
                         
                                <div class="col-md-4">
                                              <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Add A New Career Position</h3>
                                                </div>
                                                    <div class="panel-body"> 
                                                        <form method="post" action="actions/insert.php">
                                                            <div class="form-group" id="">
                                                                    <label>Enter Career Postion</label>
                                                                    <input type="text" name="c_position" class="form-control" required maxlength="50">
                                                            </div>
                                                            <div class="form-group">
                                                                    <button class="btn btn-success" type="submit" name="save_c_postion">Save</button>
                                                            </div>
                                                        </form>
                                                        

                                                    </div>
                                                </div>
                                </div>
                                   <div class="col-md-8">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">All Career Postions</h3>
                                    </div>
                                    <div class="panel-body">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="db" class="table table-striped table-bordered">
                                                     <thead>
                                                        <tr>
                                                            <th>Career Position</th>
                                                            <th>Actions</th>    
                                                          
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $query = mysqli_query($conn,"select* from career_postions");
                                                            while($row = mysqli_fetch_array($query)){
                                                                $career_postion_id = $row['career_postion_id'];
                                                                    $career_postion_name = $row['career_postion_name'];
                                                                      $actions = ' <a class="btn btn-danger" href="actions/delete.php?delete_career_pos=1&position_id='.$career_postion_id.'" title="Delete This Entry"><i class="fa fa-times"></i></a>';
                                                                     
                                                                     echo '<tr><td>'.ucwords($career_postion_name).'</td>
                                                                            <td>'.$actions.'</td>
                                                                        </tr>';
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Row -->
                  
<?php 
                    include  'includes/footer.php';
?>
<script src="assets/plugins/summernote/dist/summernote.min.js"></script>