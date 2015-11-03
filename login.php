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
						<button class="btn btn-primary">Login</button>
					</div>


			<p><a href="">Lost Password</a></p>
			<p><a href="index">Front Door</a></p>
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
