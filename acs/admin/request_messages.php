<?php
		include 'includes/header.php';
?>
	<div class="content-page">
                <div class="content">
                    <div class="container">
                         <div class="row">
                            <div class="col-md-12">
                                <div id="err_msg">
                                      
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">View Customer Request</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">

                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="db" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                           <!--  <th>ID</th> -->
                                                            <th>First Name</th>
                                                            <th>Last Name</th>
                                                            <th>Email</th>
                                                            <th>Contact Number</th>
														  <th>Zipcode</th>
                                                        	<th>Customer Type</th>    
                                                            <th>Date</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <?php 
                                                                $query = mysqli_query($conn,"SELECT * FROM `service_requests`");
                                                              
                                                                while($row= mysqli_fetch_array($query)){
                                                                  
                                                                 $service_request_id  = $row['service_request_id'];
                                                            $service_request_first_name  = $row['service_request_first_name'];
                                                            $service_request_last_name  = $row['service_request_last_name'];
                                                            $service_request_email  = $row['service_request_email'];
                                                            $service_request_phone  = $row['service_request_phone'];
                                                            $service_request_zipcode  = $row['service_request_zipcode'];
                                                            $service_request_new_customer  = $row['service_request_new_customer'];
                                                            $service_request_msg  = $row['service_request_msg'];
                                                            $service_request_datetime  = human_timedate($row['service_request_datetime']);
                                                                        

                                                                        $actions = '<button class="btn btn-inverse btn_see"  id="'.$service_request_id.'"  title="Read Message"><i class="fa fa-eye"></i></button>

                                                                          <a style="margin-top:10px" href="actions/delete.php?del_service_request=1&service_request_id='.$service_request_id.'" class="btn btn-danger" id="'.$service_request_id.'" title="Delete This Request"><i class="fa fa-times"></i></a>';
                                                                         $details ='<input type="hidden" value="'.$service_request_msg.'" id="details'.$service_request_id.'">';

                                                                          echo '<tr id="rowMSG'.$service_request_id.'">
                                                                            <td>'.$details.$service_request_first_name.'</td>
                                                                            <td>'.$service_request_last_name.'</td>
                                                                            <td>'.$service_request_email.'</td>
                                                                            <td>'.$service_request_phone.'</td>
                                                                              <td>'.$service_request_zipcode.'</td>
                                                                               <td>'.$service_request_new_customer.'</td>
                                                                                <td>'.$service_request_datetime.'</td>
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
            $("#myLargeModalLabel").html("Read Customer Request Details");
            $("#customMODAL").modal('show');
        });
</script>