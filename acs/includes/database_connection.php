<?php
				$conn = mysqli_connect("localhost","root","","acs_db");
				if(!$conn){
					echo "Database is not connected..";
					die;
				}
?>