<?php 

//verifying the user
	
			
	include 'configuration.php';
		$passkey=$_GET['passkey'];

		$query="select * from users where confirm_code='$passkey'";
		$result=mysqli_query($dbc,$query);

		if($result){
			$query="Update users SET active=1 where confirm_code='$passkey'";
			$result=mysqli_query($dbc,$query);

			echo'<p class="alert alert-success">You\'ve Successfully Confirmed your account, Please <a href="signin">Sign In </a> To continue <span class="close pull-right"> <a href="#"> X </span></p>';
		}else{

			echo '<p class="alert alert-danger">Invalid Confirmation of account <span class="close pull-right"> <a href="#"> X </span></p>';
		}

 ?>