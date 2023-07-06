<?php 
	session_start();
	if(isset($_SESSION['acs_AdminSession'])){
		unset($_SESSION['acs_AdminSession']);
		header("location:login.php");
	}
?>