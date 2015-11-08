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
<body>
	<?php
	include 'dbconnect.php';
	 include('functions.php');
		include 'session.php';
		include 'session-expire.php';
			login();

		?>
	<div class="container">
		<div class="login-form col-sm-12 col-md-4 col-md-offset-4">

			<form class="" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
					<div class="form-group">
						<input type="text" name="email" class="form-control">

					</div>




					<div class="form-group">
						<input type="password" name="password" class="form-control">
					</div>


					<div class="form-group">
						<button class="btn btn-primary"><i class="fa fa-sign-in"></i> Login</button>
					</div>

					<p><ul class="list-inline">
						<li>	<a href="register"><i class="fa fa-sign-in"></i>Open Account</a></li>
						<li><a href=""><i class="fa fa-question"></i>Lost Password</a></li>
						<li><a href="index"><i class="fa fa-home"></i>Front Door</a></li></ul>
				</p>
		</form>

		</div>
	</div>







    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
   <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  <script  src="js/custom.js"></script>

		</body>
		</html>
