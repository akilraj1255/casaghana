<!doctype html>
<html lang="en">
	<head><meta charset="utf-8">
		<title>Casa Ghana</title>
			 <link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
	
		 <!-- including font awesome into the project -->
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
	</head>
<body id="wrapper">
<?php include 'dbconnect.php';
	 include('functions.php'); ?>
		<div class=" col-md-6" >



		</div>

		<div class="property-single login-form col-md-5" style="margin:10% auto">
					<ul>
						<li> <h3 class="page-header">List Your properties on Casa Ghana</h3> </li>
						<li class="lead"> <i class="fa fa-chevron-circle-right"></i>&nbsp;<a href="register">Open an account</a>  </li>
						<li class="lead"> <i class="fa fa-chevron-circle-right"></i>&nbsp;<a href="login">Login if you already have one</a> </li>
						<li class="lead"> <i class="fa fa-chevron-circle-right"></i>&nbsp;<a href="property">View Listed Properties</a> </li>
	
					</ul>

					<ul>
						<li> <h3 class="page-header">5 Recent Listings</h3> </li>
							<?php recentListings(); ?>
					</ul>
		</div>


		<div class=" col-md-1" >


		</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
   <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  <script  src="js/custom.js"></script>

		</body>
		</html>
