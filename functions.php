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

$query="CREATE TABLE IF NOT EXISTS `users` (
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

	 $result=mysqli_query($dbc,$query);
	if($result){
		echo "well done";
	}else{
		echo "not executed";
	}
	
}


