<?php
		session_start();
		include '../../includes/database_connection.php';
		if(isset($_POST['loginAdmin'])){
				$adminName = $_POST['adminName'];
				$adminPass = $_POST['adminPass'];
				$query = mysqli_query($conn,"select* from admin where admin_email='$adminName' and admin_password='$adminPass'");
				if(mysqli_num_rows($query)==1){		
											$_SESSION['acs_AdminSession'] = $adminName;
											header("location:../index.php");
				}else{
						header("location:../login.php?wrong=1");	
				}
		}	
?>