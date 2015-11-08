<?php


//casa ghana setup
function casa_setup(){
 $query="create database if not exists casa";
	//database connection_status
 $dbc=mysqli_connect('localhost','root','lollypop28','');
 $result=mysqli_query($dbc,$query);
}


//storing db after creation of database





//creation of tables
function casa_tables(){
include 'dbconnect.php';



$users="CREATE TABLE IF NOT EXISTS `users` (
  `confirm_code` varchar(64) NOT NULL,
  `delete_code` varchar(64) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  `user_id` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `repassword` varchar(256) NOT NULL,
  `country` text NOT NULL,
  `contact` varchar(40) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`email`)
) ";

$properties="create table if not exists `properties`(
   `property_id` varchar(64) NOT NULL,
   `email` varchar(256) NOT NULL,
   `title` varchar(256) NOT NULL,
   `property_type` varchar(256) NOT NULL,
   `price` varchar(256) NOT NULL,
   `description` mediumtext NOT NULL,
   `contact` varchar(256) NULL,
   `location` text NOT NULL,
   PRIMARY KEY (`email`)
)";

$locations="create table if not exists `locations`(
    `location_id` varchar(256) not null,
    `location_name` varchar(256) not null,
    `region` varchar(256)  null,
    `state` varchar(256)  null,
      PRIMARY KEY (`location_id`)
)";

$proptype="create table if not exists `property_type`(
`type_id` varchar(256) not null,
`type_name` varchar(256) not null,
  PRIMARY KEY (`type_id`)
)";
	 $userresult=mysqli_query($dbc,$users);
   $propresult=mysqli_query($dbc,$properties);
   $typeresult=mysqli_query($dbc,$proptype);
   $locationresult=mysqli_query($dbc,$locations);
};

//login function
function login(){
	if($_POST){include 'dbconnect.php' ;
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

		echo '<p class="alert alert-success text-center">Welcome &nbsp;'.$first_name .'&nbsp; '.$last_name.' <span class="close pull-right"> <a href="#" >&times;</span></p>';
				header("location:index");}else{echo '<p class="alert alert-danger text-center">Wrong Email / Password! <span class="close pull-right"> <a href="#" >&times;</span></p>';}

	mysqli_close($dbc);
	};
};

//new member
function newMember(){
  if($_POST){
   include 'dbconnect.php' ;
 $fname=mysqli_escape_string($dbc,$_POST['fname']);
 $lname=mysqli_escape_string($dbc,$_POST['lname']);
 $email=filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
 $password=mysqli_escape_string($dbc,md5(md5($_POST['password'])));
 $confemail=filter_var($_POST['conf-email'],FILTER_VALIDATE_EMAIL);
 // $contact=mysqli_escape_string($dbc,$_POST['contact']);
 // $region=mysqli_escape_string($dbc,$_POST['region']);
 $confirm_code=md5(uniqid(rand()));
 $user_id=md5(rand(0,10000));
 //new block added
 if($fname=="" or $lname=="" or $email=="" || $password=="" || $confemail==""  ){echo '<p class="alert alert-danger text-center">Please Make Sure All Fields Are Filled <span class="close pull-right"> <a href="#" >&times;</span></p>';}

 elseif($email==$confemail){
   $query="select * from users where email='$email'";
   $result=mysqli_query($dbc,$query);

   if(mysqli_num_rows($result)==1){

     echo '<p class="alert alert-danger text-center">We already have someone with that email <span class="close pull-right"> <a href="#" >&times;</span></p>';
   }elseif(mysqli_num_rows($result)==0){
 $query="insert into users(first_name,last_name,email,password,confirm_code,user_id)
       values('$fname','$lname','$email','$password','$confirm_code','$user_id')";
 $data=mysqli_query($dbc,$query);

     if($result){
           //sending confirmation code to new user's email
       $to=$email;

       //my subject
       $subject="Your Comfirmation link";


       //from
       $header="From: casaghana.com";

       //My Message
       $message="It's an honor to have you as a new member of the portal.We have been working to build casaghana.com\r\n";
       $message.="casaghana.com is a web portal that gives opportunity for ghanaians to list their property. \r\n We work day and night to keep it original, safe and accessible to our users. \r\n
       To begin, please verify your email. This will ensure you can sign into casaghana.com \r\n
       ";

       $message.="click on this link to activate your account\r\n";
       $message.="http://www.casaghana.com/confirmation?passkey=$confirm_code";

       //sending the mail
       $sentmail=mail($to,$subject,$message,$header);
       echo '<p class="alert alert-success center-block"> Your Account is ready.Please Click the confirmation link we sent you and
  Just <span class="link"><a href="signin" >Sign In</a></span> <span class="close pull-right"> <a href="#"> X </span></p>';

}else{echo '<p class="alert alert-danger text-center">Something is not right <span class="pull-right close"> <a href="#" >&times;</span></p>';}


       mysqli_close($dbc);

       }
     }
   };


};

//function user profile
function member(){
 include 'dbconnect.php';
 $query ="select * from users";
 $result=mysqli_query($dbc,$query);
 $fetch=mysqli_fetch_row($result);

}
