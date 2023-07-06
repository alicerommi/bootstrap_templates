<?php
		include 'includes/header.php';
?>
	<div class="content-page">
                <div class="content">
                    <div class="container">
                   <!--    <div class="row">
                            <div class="col-sm-12">
                                   <h4 class="pull-left page-title">Support</h4>
                                <ol class="breadcrumb pull-right">
                                  <li class="active">View All Messages</li>
                                </ol>
                            </div>
                        </div> -->
                         <div class="row">
                            <div class="col-md-12">
                                <div id="err_msg">
                                      
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">View Contact Us Messages</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">

                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="db" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                           <!--  <th>ID</th> -->
                                                            <th>Msg ID</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Contact Number</th>
															<th>Date</th>    
                                                         
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <?php 
                                                                $query = mysqli_query($conn,"SELECT * FROM `contact` ");
                                                            
                                                                while($row= mysqli_fetch_array($query)){
                                                                       $contact_id = $row['contact_id'];
                                                                        $contact_name = $row['contact_name'];
                                                                        $contact_email = $row['contact_email'];
                                                                        $contact_subject = $row['contact_subject'];
                                                                        $contact_msg = $row['contact_msg'];



                                                                        $contact_date = human_timedate($row['contact_date']);
                                                                         $actions = '<button class="btn btn-inverse btn_see"  id="'.$contact_id.'"  title="Read Message"><i class="fa fa-eye"></i></button>

                                                                          <a href="actions/delete.php?del_user_contact=1&contact_id='.$contact_id.'" class="btn btn-danger delete" id="'.$contact_id.'" title="Delete This Message"><i class="fa fa-times"></i></a>';
                                                                         $details ='<input type="hidden" value="'.$contact_msg.'" id="details'.$contact_id.'">';

                                                                          echo '<tr id="rowMSG'.$contact_id.'">
                                                                            <td>'.$details.$contact_id.'</td>
                                                                            <td>'.$contact_name.'</td>
                                                                            <td>'.$contact_email.'</td>
                                                                            <td>'.$contact_subject.'</td>
                                                                              <td>'.$contact_date.'</td>
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
        $(document).on('click','.btn_see',function(){
            let id = $(this).attr('id');
            let details = $("#details"+id).val();
            $("#modalData").empty().append(details);
            $("#myLargeModalLabel").html("Read Message");
            $("#customMODAL").modal('show');
        });
</script>