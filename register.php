<!doctype html>
<html lang="en">
	<head><meta charset="utf-8">
		<title>Casa Ghana</title>
		<link href="css/style.css" rel="stylesheet">
		 <link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
<body>
	<?php include('functions.php');
			include 'dbconnect.php';
			newMember();
		?>

	<div class="container">
		<div class="login-form col-sm-12 col-md-4 col-md-offset-4">

			<form action="<?php $_SERVER['PHP_SELF']?>" method="POST" >
					<div class="form-group col-md-6">
					<input type="text" class="form-control" autofocus name="fname" autocomplete="off" placeholder="First Name" required>
					</div>

					<div class="form-group col-md-6">
					<input type="text" class="form-control" name="lname" autocomplete="off" placeholder="Last Name" required>
					</div>

					<div class="form-group col-md-12">
					<input type="email" class="form-control" name="email" autocomplete="off" placeholder="Your Email" required>
					</div>

					<div class="form-group col-md-12">
					<input type="email" class="form-control" name="conf-email" autocomplete="off" placeholder="Confirm Your Email" required>
					</div>

					<div class="form-group col-md-12">
					<input type="password" class="form-control" name="password" autocomplete="off" placeholder="Your Password" required>
					<br>
					<input type="submit" class="btn btn-primary" value="Sign Up">&nbsp;<a href="login">Log In?</a>
					</div>
					
					<div class="form-group col-md-12">
					<p><a href="">Lost Password</a></p>
					<p><a href="index">Front Door</a></p>
					</div>



						</form><!-- end of sign up form -->

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
