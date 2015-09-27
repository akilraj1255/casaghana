<?php 


//recovering your password and email address


	include 'configuration.php';

	if($_POST){
	$email=mysqli_escape_string($dbc,$_POST['email']);
//	check if email exist
	$query="select * from  users where email='$email'";
	$result=mysqli_query($dbc,$query);
	$row=mysqli_num_rows($result);
	if($row==1){
	$userid=md5(md5(uniqid(rand())));

	$query="update users SET user_id='$userid' where email='$email'";
	$result=mysqli_query($dbc,$query);


			if($result){
					//sending confirmation code to new user's email
			$to=$email;
			
			//my subject
			$subject="Your Password Reset Link";


			//from
			$header="From: idamou.com";

			//My Message
			$message="Please follow this link  \r\n";
			$message.="click on this link to set a new password for  your account\r\n";
			$message.="http://www.idamou.com/new-password?userid=$userid";

			//sending the mail
			$sentmail=mail($to,$subject,$message,$header);

		};

echo '<p class="alert alert-success"> We\'ve sent you a message, please click on the link in your email to set your new password</p>';}else{echo '<p class="alert alert-danger">Something is not right</p>';}

			
			mysqli_close($dbc);};






 ?>