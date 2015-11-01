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
	casa_setup();
	
	casa_tables();
	?>
	<div class="navbar navbar-default">
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

			<div class="collapse navbar-collapse pull-right ">
					<ul class="nav navbar-nav text-center col-sm-4 col-md-12">
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
