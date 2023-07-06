<?php
	 // Developed By: http://binary6.pk/ 
  // Email: sami@binary6.pk, rehman@binary6.pk
  // Mobile Number: +92335 6050509
  // Mobile Number: +92331 8207979
		include '../../includes/database_connection.php';
			function get_requested_page_uri($str){
			        $bb = explode("/",$str);
			        $d =  $bb[sizeof($bb)-1];
			        $findme = "?";
			        $pos = strpos($d, $findme);
			        if($pos==false){
			                  $variable = $d;
			        }else{
			                  $variable = substr($d, 0, strpos($d, "?"));
			        }
			        return $variable;
			}

		if(isset($_GET['delete_career_pos'])){
			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
			$position_id = $_GET['position_id'];
			$query =mysqli_query($conn,"delete from career_postions where career_postion_id = $position_id");
			if($query)
				header("location:../".$page_name."?deleted=1");
			else
				header("location:../".$page_name."?deleted=0");
		}   //end delete_career_pos

		if(isset($_GET['delete_job'])){
			$job_id = $_GET['job_id'];
			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
			$delete = mysqli_query ($conn,"delete from careers where career_id=$job_id");
			if($delete)
				header("location:../".$page_name."?deleted=1");
			else
				header("location:../".$page_name."?deleted=0");

		}

		if(isset($_GET['del_user_contact'])){
			$contact_id= $_GET['contact_id'];
			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
			$query =mysqli_query($conn,"delete from contact where contact_id = $contact_id");
			if($query)
				header("location:../".$page_name."?deleted=1");
			else
				header("location:../".$page_name."?deleted=0");
		}

		if(isset($_GET['del_service_request'])){
			$service_request_id = $_GET['service_request_id'];
			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
				$query =mysqli_query($conn,"delete from service_requests where service_request_id = $service_request_id");
			if($query)
				header("location:../".$page_name."?deleted=1");
			else
				header("location:../".$page_name."?deleted=0");
		}
?>