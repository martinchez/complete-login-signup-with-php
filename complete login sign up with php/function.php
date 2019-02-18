<?php

function email_exists ($email,$con){
	$row=mysqli_query($con,"SELECT id FROM users WHERE mail='$email'");
	//print_r($row);
	{
		if (mysqli_num_row($row)==1) {
			return true;
		}else{
			return false;
		}
	}
}

?>