<?php
		include '../includes/database_connection.php';
		$now = date("Y-m-d");

function human_timedate($date){
                   $time=substr ($date,11);
                    $time_in_12_hour_format  = date("g:i a", strtotime($time));
                    $dt = trim(substr($date,0,10)); 
                    list($year,$month,$day) = explode("-",$dt);
                    $finalDate = $day."/".$month."/".$year;
                    $time_date = $finalDate." ".$time_in_12_hour_format;
                    return $time_date; 
} 

if(isset($_POST['fetch_jobs'])){
	
		 $sql ="SELECT * FROM `careers` join career_postions where careers.career_position_id= career_postions.career_postion_id and careers.career_expiry_date>='$now'";
		
		$query = mysqli_query($conn,$sql);
		$html = "";
			$num_of_records = mysqli_num_rows($query);
			$arr['num_of_records'] = $num_of_records;
			if($num_of_records>0){
	        	while($row= mysqli_fetch_array($query)){

		            $career_id = $row['career_id'];
		            $career_position_id = $row['career_position_id'];
		            $career_title = $row['career_title'];
		            $career_description = $row['career_description'];
	                $career_expiry_date = date("d-m-Y",strtotime($row['career_expiry_date']));               
	                $career_country = $row['career_country'];
	                $career_city = $row['career_city'];
	                $career_minimum_salary = $row['career_minimum_salary'];
	                $career_maximum_salary = $row['career_maximum_salary'];
	                $career_experience = $row['career_experience'];
	                $career_education = $row['career_education'];
	                $career_type = $row['career_type'];
	                $career_added_timestamp = human_timedate($row['career_added_timestamp']);
	                $career_postion_name = $row['career_postion_name'];
	                $html =$html.'<div class="items-area">
	             
					              <div class="company-details">
					                <h2>'.$career_title.'</h2>
					                <p>'.ucwords($career_postion_name).'</p>
					                <ul class="inline">
					                  <li><span class="icon"><i class="fa fa-building"></i></span> <span class="title">'.$career_country.'</span></li>
					                  <li><span class="icon"><i class="fa fa-map"></i></span> <span class="title">'.$career_city.'</span></li>
					                  <li><span class="icon"><i class="fa fa-dollar"></i></span> <span class="title">'.$career_minimum_salary.' - '.$career_maximum_salary.'</span></li>
					                  <li><span class="icon"><i class="fa fa-clock-o"></i></span> <span class="title">'.$career_type.'</span></li>
					                  <li><span class="icon"><i class="fa fa-briefcase"></i></span> <span class="title">'.$career_experience.'</span></li>
					                   <li><span class="icon"><i class="fa fa-university"></i></span> <span class="title">'.$career_education.'</span></li>
					                   <li><span class="icon"><i class="fa fa-calendar"></i></span> <span class="title">'.$career_expiry_date.'</span></li>
					                </ul>
					                <div class="text">
					                  <p>'.$career_description.'</p>
					                </div>
					                <div class="company-footer">
					                  <div class="left">
					                    <p>Posted by <span>Admin</span></p>
					                    <strong>'.$career_added_timestamp.'</strong>
					                  </div>
					                  <div class="right">
					                    <a href="#" class="btn btn-default apply_now" id="'.$career_id.'" data-id="'.ucwords($career_title).'" data-toggle="modal" >Apply Now</a>
					                  </div>
					                </div>
					              </div>
					            </div>';                           	
	            }  //end while loop here
            $arr['html']=$html;
        }//end if here
        echo json_encode($arr);
} ///end fetch_jobs
?>