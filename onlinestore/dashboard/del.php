<?php
	include '../include/config.php';
	
	if(isset($_GET['del'])){
		$id =  $_GET['del'];
		$query = "DELETE FROM _order WHERE id='$id'";
		if($conn->query($query)){
				header("location: ./orders.php?msg=Successfully Deleted");
		}else{
			echo "<h1>Something Went Wrong</h1>";	
		}
	}else{
		header("location: ./");
	}

	
?>