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
<body>
	<div class="row notice text-center">
    Welcome to Casa Ghana Beta!! Rent, Buy , Sale or Share your properties. <a href="new-property" class="btn call-btn">List Yours</a>
	</div>
<?php include('functions.php');
	casa_setup();
	casa_tables();
		include 'dbconnect.php';
		include 'session.php';
				include 'session-expire.php';
				member();
			logout_modal();

	?>
	<div class="navbar">
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
						<li><a href="index"><i class="fa fa-home"></i>&nbsp;Home</a></li>
						<!-- <li><a href="property">Properties</a></li>
						<li><a href="">About</a></li>
						<li><a href="">Contact</a></li> -->
						<?php if(!isset($user)) :?>
							<li><a href="login"><i class="fa fa-sign-in"></i>&nbsp;Login</a></li>
							<li><a href="register"><i class="fa fa-user-plus"></i>&nbsp;Register</a></li>
						<?php else: ?>

							<li><a href="member"> <i class="fa fa-user"></i>&nbsp; <?php echo $row['first_name'] ?> </a></li>
								<li class=""><a data-toggle="modal" data-target="#logout" href="#"><i class="fa fa-sign-out"></i>&nbsp;logout</a></li>
						<?php endif; ?>

						<!-- <li><a href="#" class="my-search"><i class="fa fa-search"></i>&nbsp;search</a></li> -->
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
