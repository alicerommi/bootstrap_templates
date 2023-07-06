<?php
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

		if(isset($_POST['save_c_postion'])){
			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
			$c_position = strtolower($_POST['c_position']);
			$check = mysqli_query($conn,"select* from career_postions where career_postion_name='$c_position'");
			if(mysqli_num_rows($check)==0){
				$insert = mysqli_query($conn,"INSERT INTO `career_postions`(`career_postion_name`) VALUES ('$c_position')");
				if($insert){
					header("location:../".$page_name."?added=1");
				}else
				header("location:../".$page_name."?added=0");
			}else{
				header("location:../".$page_name."?already_e=1");
			}
		}  //end save_c_postion

		if(isset($_POST['add_job'])){
			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
			$job_title = $_POST['job_title'];
			$career_position = $_POST['career_position'];
			$job_country = $_POST['job_country'];
			$job_city = $_POST['job_city'];
			$job_last_date = $_POST['job_last_date'];
			$mini_sal = $_POST['mini_sal'];
			$max_sal = $_POST['max_sal'];
			$job_ex = $_POST['job_ex'];
			$job_des = mysqli_escape_string($conn,$_POST['job_des']);
			$job_type = $_POST['job_type'];
			$job_qual = $_POST['job_qual'];
			$insert = mysqli_query($conn,"INSERT INTO `careers`(`career_position_id`, `career_title`, `career_description`, `career_expiry_date`, `career_country`, `career_city`, `career_minimum_salary`, `career_maximum_salary`, `career_experience`, `career_education`, `career_type`) VALUES ($career_position,'$job_title','$job_des','$job_last_date','$job_country','$job_city','$mini_sal','$max_sal','$job_ex','$job_qual','$job_type')");
			if($insert){
					header("location:../".$page_name."?added=1");
				}else
			header("location:../".$page_name."?added=0");
		}  //end add_job
?>