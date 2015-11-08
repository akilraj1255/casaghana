<?php
include 'dbconnect.php';
session_start();

//session in seconds
@$user=$_SESSION['userid'];



$query="select * from users where email='$user'";
$result=mysqli_query($dbc,$query);
$row=mysqli_fetch_array($result);
$useremail=$row['email'];
$username=$row['first_name'];






?>
