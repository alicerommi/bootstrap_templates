<?php
		include '../includes/database_connection.php';
		$dir= "../uploads/job_cvs/";
		function rand_string( $length ) {  
					$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz@#$&*";  
					$size = strlen( $chars );  
					//echo "Random string =";  
					for( $i = 0; $i < $length; $i++ ) {  
					$str= $chars[ rand( 0, $size - 1 ) ];    
					}
					return $str;  
		}  

		 function generate_unique_id(){
                    $now = new DateTime();
                    return $now->getTimestamp(); 
                }

		function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
		if(isset($_POST['apply_for_job_employee'])){
			$fullname = test_input($_POST['fullname']);
			$phone_number = test_input($_POST['phone_number']);
			$email = test_input($_POST['email']);
			$message = mysqli_escape_string($conn,$_POST['message']);
			$file_name = $_FILES['cv_document']['name'];
			$career_id =test_input($_POST['career_id']);
			$type=strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
			$now_file_name = generate_unique_id()."_cv_".rand_string(rand(1,strlen($email))).".".$type;
			$check = mysqli_query($conn,"select* from job_applications where career_id=$career_id and applicant_email_address='$email'");
			if(mysqli_num_rows($check)==0){
					if(move_uploaded_file($_FILES['cv_document']['tmp_name'], $dir.$now_file_name)){
						$sql = "INSERT INTO `job_applications`( `career_id`, `applicant_name`, `applicant_email_address`, `applicant_phone`, `applicant_brief_description`, `applicant_cv`) VALUES ($career_id,'$fullname','$email','$phone_number','$message','$now_file_name')";
						$insert = mysqli_query($conn,$sql);
						if($insert){
							$arr = array('success'=>1,'msg'=>'Thanks For Applying!, Your Application Has Been Submitted. We Will Contact You Soon','file_uploaded'=>1);
						}else{
							$arr = array('success'=>0,'msg'=>mysqli_error($conn),'file_uploaded'=>1);
						}
					}
			}else{
				$arr = array('success'=>0,'msg'=>'Application Submission Failed!, You Have Already Applied For This Job','file_uploaded'=>0);
			}
			echo json_encode($arr);
			
		} //end apply_for_job_employee

		if(isset($_POST['save_request'])){
			

			$first_name = test_input($_POST['first_name']);
			$last_name = test_input($_POST['last_name']);
			$customer_email = test_input($_POST['customer_email']);
			$customer_phone = test_input($_POST['customer_phone']);
			$customer_zipcode = test_input($_POST['customer_zipcode']);
			$customer_new = test_input($_POST['customer_new']);
			$user_msg = mysqli_escape_string($conn,test_input($_POST['user_msg']));

			$insert = mysqli_query($conn,"INSERT INTO `service_requests`( `service_request_first_name`, `service_request_last_name`, `service_request_email`, `service_request_phone`, `service_request_zipcode`, `service_request_new_customer`, `service_request_msg`) VALUES ('$first_name','$last_name','$customer_email','$customer_phone','$customer_zipcode','$customer_new','$user_msg')");
			if($insert){
					$arr = array('success'=>1,'msg'=>'Thanks For Sending Us Request, We Will Contact You Soon');
			}else{
						$arr = array('success'=>0,'msg'=>mysqli_error($conn));
			}
			echo json_encode($arr);
		}  //end save_request

		if(isset($_POST['contact_msg_request'])){

			$contact_name = test_input($_POST['contact_name']);
			$contant_email = test_input($_POST['contant_email']);
			$contact_subject = test_input($_POST['contact_subject']);
			$message = mysqli_escape_string($conn,test_input($_POST['message']));
			$insert = mysqli_query($conn,"INSERT INTO `contact`( `contact_name`, `contact_email`, `contact_subject`, `contact_msg`) VALUES ('$contact_name','$contant_email','$contact_subject','$message')");
			if($insert)
				$arr = array('success'=>1,'msg'=>'Your Message Has Been Sent Successfully, We Will Contact You Soon');
			else
				$arr = array('success'=>0,'msg'=>mysqli_error($conn));
			echo json_encode($arr);
		} //end contact_msg_request
?>