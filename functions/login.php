<?php
//User Login


	if($_POST){include 'configuration.php' ;
	$email=$_POST['email'];
$password=mysqli_escape_string($dbc,md5(md5($_POST['password'])));
	
$query="select * from users where email='$email' and password='$password' and active='1'";
$result=mysqli_query($dbc,$query);
$row=mysqli_num_rows($result);
$fetch=mysqli_fetch_array($result);
		$id=$fetch['user_id'];
		$first_name=$fetch['first_name'];
		$last_name=$fetch['last_name'];

	if($row==1){
	@session_start();
	$_SESSION['userid']=$email;
	@$_SESSION['expire'] = time()+5*60;

		echo '<p class="alert alert-success text-center">Welcome &nbsp;'.$first_name .'&nbsp; '.$last_name.'</p>';
				header("location:index");}else{echo '<p class="alert alert-danger text-center">Wrong Email / Password!</p>';}
	
	mysqli_close($dbc);
	};




?>