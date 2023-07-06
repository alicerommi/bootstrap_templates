<?php

	 // Developed By: http://binary6.pk/ 
  // Email: sami@binary6.pk, rehman@binary6.pk
  // Mobile Number: +92335 6050509
  // Mobile Number: +92331 8207979

	//for showing the alert messages 
	function messages($msg,$type){
		if($type=="success"){
			
			//echo '<div class="alert alert-success actions_messages text-center text-center" >'.$msg.'</div>';
			echo '<div class="alert alert-'.$type.' alert-dismissible fade in actions_messages text-center">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            '.$msg.'
                                        </div>';
		}else if($type=="warning"){
			//echo '<div class="alert alert-warning actions_messages text-center text-center" >'.$msg.'</div>';
				echo '<div class="alert alert-'.$type.' alert-dismissible fade in actions_messages text-center">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            '.$msg.'
                                        </div>';
		}else if($type=="danger"){
			//echo '<div class="alert alert-danger actions_messages text-center text-center"  >'.$msg.'</div>';
				echo '<div class="alert alert-'.$type.' alert-dismissible fade in actions_messages text-center">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            '.$msg.'
                                        </div>';
		}else if($type=="info"){
			//echo '<div class="alert alert-info actions_messages text-center text-center"  >'.$msg.'</div>';
				echo '<div class="alert alert-'.$type.' alert-dismissible fade in actions_messages text-center">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            '.$msg.'
                                        </div>';
		}
	}	
	//for showing the information related to page in admin panel
	function info_message($msg){
		echo '<div class="alert alert-info alert-dismissible fade in " style="font-weight:600;">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Info! 
                                           	'.$msg.'
        </div>';
	}
	//for showing the back button on each page
	function show_back_button($page_link,$btn_title){
			echo '<div class="pull-right"><a href="'.$page_link.'" title="'.$btn_title.'" class="btn btn-danger waves-effect waves-light m-b-5"><i class="md md-keyboard-arrow-left"></i> '.$btn_title.'</a></div>';
	}

	function show_button($page_link,$btn_title,$btn_type,$icon){
			echo '<div class="pull-right" style="margin-bottom: 20px;"><a href="'.$page_link.'" title="'.$btn_title.'" class="btn btn-'.$btn_type.'" waves-effect waves-light m-b-5"><i class="fa fa-'.$icon.'"></i> '.$btn_title.'</a></div>';
	}


?>