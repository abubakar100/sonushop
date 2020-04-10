<?php
	$conn= new mysqli("localhost","root","","online_store");
		if($conn->connect_errno){
			echo $conn->connect_errno;
		
		}

?>