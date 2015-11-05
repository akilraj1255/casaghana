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
<?php include('functions.php');
	casa_setup();
	casa_tables();
		include 'dbconnect.php';
	?>
	<div class="navbar ">
		<div class="container-fluid">
			<div class="navbar-header">
				<div class="navbar-brand"> Casa Ghana </div>

				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>


				</button>
			</div>

			<div class="collapse navbar-collapse col-md-12 text-center ">
					<ul class="nav navbar-nav">
						<li><a href="index">Home</a></li>
						<li><a href="property">Properties</a></li>
						<li><a href="">About</a></li>
						<li><a href="">Contact</a></li>
						<li><a href="login">Login</a></li>
						<li><a href="register">Register</a></li>
					</ul>

			</div>
			</div>
	</div>

	<!-- end of navigation-->

	<div class="container">
			<form class="col-md-12 search">
				<div class="col-md-10 form-group center-block">
					<input type="search" placeholder="Search for properties" class="form-control center-block" />
				</div>

				<div class="col-md-2 form-group">
					<a href="" class="btn btn-primary">Search</a>
				</div>
			</form>
	</div>
