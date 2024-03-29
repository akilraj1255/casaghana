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
<body id="wrapper" >
	<?php include('functions.php');
			include 'dbconnect.php';
			newMember();
		?>

	<div class="container">
		<div class="login-form property-single col-sm-12 col-md-4 col-md-offset-4">
<div class="action-icon"><i class="fa fa-user-plus fa-lg"></i></div>
<div class="">
	<h3 class="text-center">Glad you want to join the community</h3>
</div>
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
							<button class="btn btn-primary btn-block"><i class="fa fa-sign-in"></i> Register</button>
					</div>

					<div class="form-group col-md-12">
					<p><ul class="list-inline text-center">
						<li>	<a href="login"><a href="login"><i class="fa fa-sign-in"></i>&nbsp;Log In?</a></li>
						<li><a href="recover"><i class="fa fa-question"></i>&nbsp;Lost Password</a></li>
						<li><a href="index"><i class="fa fa-home"></i>&nbsp;Front Door</a></li></ul>
					</p>
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
