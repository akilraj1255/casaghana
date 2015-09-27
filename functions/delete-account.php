<?php 


//confirming  user deletion

	include 'configuration.php';
	//getting the pass key
	$delete=$_GET['deletecode'];

	$sql="select * from users where delete_code='$delete'";
	$result=mysqli_query($dbc,$sql);

	if($result){
		$count=mysqli_num_rows($result);
		
			$row=mysqli_fetch_array($result);
			$deletion="Delete  from  users where delete_code='$delete'";
			$resultactivate=mysqli_query($dbc,$deletion);

	echo'<p class="alert alert-success">You\'ve Successfully Confirmed the deletion your account,It have been done Immediately and you may not recover your account';
	

		
	}





  ?>