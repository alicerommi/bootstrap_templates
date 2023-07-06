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
		if(isset($_POST['saveProfiel'])){
				$admin_id = $_POST['admin_id'];
				$FullName = $_POST['FullName'];
				$Password = $_POST['Password'];
				$RePassword = $_POST['RePassword'];

				if(isset($_FILES['image']['name'])){
					$path = 	$_FILES['image']['name'];
				$file = "../assets/images/users/".$path;
				$ext =  strtolower(pathinfo($path, PATHINFO_EXTENSION));
								if($ext=="png" || $ext=="jpg" || $ext=="jpeg"){
												if(move_uploaded_file($_FILES['image']['tmp_name'], $file)){
													 $sql =  "UPDATE `admin` SET `admin_name`='$FullName',`admin_pic`='$path',`admin_password`='$Password' WHERE admin_id=$admin_id";
													
													$query = mysqli_query($conn,$sql);

																if($query){
																	header("location:../admin_profile.php?updated=1");
																}else{
																	header("location:../admin_profile.php?updated=0");
																}
												}else{
															header("location:../admin_profile.php?uploadErr=0");
												}


										}else{		
											header("location:../admin_profile.php?invalidFormat=0");
										}
				}else{

							$query = mysqli_query($conn,"UPDATE `admin` SET `admin_name`='$FullName,`admin_password`='$Password' WHERE admin_id=$admin_id");
									if($query){
											header("location:../admin_profile.php?updated=1");
								}else{
									header("location:../admin_profile.php?updated=0");
								}
				}
		}


		if(isset($_POST['update_job'])){
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
			$career_id = $_POST['career_id'];
			$update = mysqli_query($conn,"UPDATE `careers` SET `career_position_id`=$career_position,`career_title`='$job_title',`career_description`='$job_des',`career_expiry_date`='$job_last_date',`career_country`='$job_country',`career_city`='$job_city',`career_minimum_salary`='$mini_sal',`career_maximum_salary`='$max_sal',`career_experience`='$job_ex',`career_education`='$job_qual',`career_type`='$job_type' where `career_id`=$career_id");
			if($update){
					header("location:../".$page_name."?updated=1&career_id=".$career_id);
			}else
			header("location:../".$page_name."?updated=0&career_id=".$career_id);
		}//end update_job
?>