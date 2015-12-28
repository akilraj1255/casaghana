<!doctype html>
<html lang="en">
	<head><meta charset="utf-8">
		<title>Casa Ghana</title>
		<link href="css/style.css" rel="stylesheet">
		 <link href="css/bootstrap.min.css" rel="stylesheet">
		 <!-- including font awesome into the project -->
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
	</head>
<body id="wrapper">
	<?php
	include 'dbconnect.php';
	 include('functions.php');
		include 'session.php';
		include 'session-expire.php';
			login();

		?>
	<div class="container">
		<div class="alert alert-sucess">  			<?php
$passkey=$_GET['passkey'];
if($passkey==""){
header("location:index");
}else{

confirmation();
}
?></div>
	</div>







    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
   <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  <script  src="js/custom.js"></script>

		</body>
		</html>
