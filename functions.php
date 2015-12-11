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
   `owner` varchar(64) NOT NULL,
   `email` varchar(256) NOT NULL,
   `title` varchar(256) NOT NULL,
   `property_type` varchar(256) NOT NULL,
   `price` varchar(256) NOT NULL,
   `description` mediumtext NOT NULL,
   `contact` varchar(256) NULL,
   `location` text NOT NULL,
   `status` varchar(256) not null,
   `images` varchar(256),
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

`type_name` varchar(256) not null,
  PRIMARY KEY (`type_name`)
)";

$property_id=md5(rand(0,10000));
$insertCheck="select * from property_type";
$check=mysqli_query($dbc,$insertCheck);
$check_result=mysqli_num_rows($check);
if($check_result==0){
$insertPropType= "insert into property_type  values('single house'),('family house'),
('villa'),('appartment')";
 $insertproptype=mysqli_query($dbc,$insertPropType);
};

$status="create table if not exists `property_status`(

`status_name` varchar(256) not null,
  PRIMARY KEY (`status_name`)
)";


$statusCheck="select * from property_status";
$checkstatus=mysqli_query($dbc,$statusCheck);
$status_result=mysqli_num_rows($checkstatus);
if($status_result==0){
$insertstatus= "insert into property_status  values('rent'),('lease'),
('room sharing')";
 $insertpropstatus=mysqli_query($dbc,$insertstatus);
};


	 $userresult=mysqli_query($dbc,$users);
   $propresult=mysqli_query($dbc,$properties);
   $typeresult=mysqli_query($dbc,$proptype);
   $locationresult=mysqli_query($dbc,$locations);
    $statusresult=mysqli_query($dbc,$status);

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

		echo '<p class="alert alert-success text-center">Welcome &nbsp;'.$first_name .'&nbsp; '.$last_name.' <span class="close pull-right"> <a href="#" >&times;</a></span></p>';
				header("location:index");}else{echo '<p class="alert alert-danger text-center">Wrong Email / Password! <span class="close pull-right"> <a href="#" >&times;</a></span></p>';}

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
 if($fname=="" or $lname=="" or $email=="" || $password=="" || $confemail==""  ){echo '<p class="alert alert-danger text-center">Please Make Sure All Fields Are Filled <span class="close pull-right"><span class="close pull-right"> <a href="#" >&times;</a></span></p>';}

 elseif($email==$confemail){
   $query="select * from users where email='$email'";
   $result=mysqli_query($dbc,$query);

   if(mysqli_num_rows($result)==1){

     echo '<p class="alert alert-danger text-center">We already have someone with that email <span class="close pull-right"><span class="close pull-right"> <a href="#" >&times;</a></span></p>';
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
  Just <span class="link"><a href="signin" >Sign In</a></span> <span class="close pull-right"> <a href="#"> X </a></span></p>';

}else{echo '<p class="alert alert-danger text-center">Something is not right <span class="pull-right close"> <a href="#" >&times;</a></span></p>';}


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
 $fetch=mysqli_fetch_array($result);

}


//function popover
function logout_modal(){
?>

<!-- modal beginning -->
<div class="modal  fade" data-backdrop="static" id="logout" tab-index="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">

  <div class="modal-dialog">
    <div class="modal-content">
    <!-- modal header -->
    <div class="modal-header">
  <button type="btn" class="close" data-dismiss="modal" aria-hidden="true">x</button>
  <h4 class="modal-title" id="modalLabel">Saying Goodbye?</h4></div>
    <!-- modal body -->

    <div class="modal-body">
   you are saying goodbye for today. Do you wish to logout?

    </div>

    <!-- modal footer -->

    <div class="modal-footer">

    <button class="btn" type="button" data-dismiss="modal">Close </button>

    <a href="logout" class="btn btn-danger "  value="Logout" name="discard" >Logout</a>

    </div>

    </div>




  </div>

</div><!-- end of modal -->
<?php

}

//function for sidebar properties
function property_type(){
  include 'dbconnect.php';
  $query="select * from property_type";
  $result=mysqli_query($dbc,$query);


  while($row=mysqli_fetch_array($result)){
    $category=$row['type_name'];
    echo'
    <li class="list-group-item ">
      <a href="property?category='.$category.'"><i class="fa fa-tags"></i>&nbsp;'.$row['type_name'].'</a> </li>
  ';
  }
}
//posting new property
function new_listing(){
  if($_POST){
      include 'dbconnect.php';
  $name=mysqli_escape_string($dbc,$_POST['name']);
  $email=mysqli_escape_string($dbc,$_POST['email']);
  $contact=mysqli_escape_string($dbc,$_POST['contact']);
  $title=mysqli_escape_string($dbc,$_POST['title']);
  $location=mysqli_escape_string($dbc,$_POST['location']);
  $price=mysqli_escape_string($dbc,$_POST['price']);
    $type=mysqli_escape_string($dbc,$_POST['type']);
  $description=mysqli_escape_string($dbc,$_POST['description']);
    $status=mysqli_escape_string($dbc,$_POST['status']);
  $listid=uniqid(rand(0,10000));
  $target_path="uploads/";
$target_path=$target_path.basename($_FILES['uploadedfile']['name']);
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {

}

  $query="select * from properties where email='$email'";
  $result=mysqli_query($dbc,$query);
  $row=mysqli_num_rows($result);
  if($row!=1){
    $query="insert into properties(owner,email,contact,title,location,
    price,description,property_id,status,images,property_type) values('$name','$email','$contact',
    '$title','$location','$price','$description','$listid','$status','$target_path','$type')";

    $result=mysqli_query($dbc,$query);

    echo '<p class="bg-success">Property Listing Successful</p>';
  }else{
    echo '<p class="bg-danger">My bad!!! Something went totally wrong. Try again later while i try to fix it <span class="close pull-right"> <span class="close pull-right"> <a href="#" >&times; </a></span></p>';
  }
}

};


//listing user classifieds
function user_listings(){
include 'dbconnect.php';
@include 'session.php';
$query="select * from properties where email='$user'";
$result=mysqli_query($dbc,$query);
$row=mysqli_fetch_array($result);

if (mysqli_num_rows($result)==1) {

echo '<div class="col-md-4 thumbnail " id="image-gallery"">
<a href="'.$row['images'].'"><img class="img-responsive" src="'.$row['images'].'" /></a>
</div>

 <div class=" col-sm-4 col-md-8 user-listing">
 <ul class="">
  <li><h3><a href="view-listing?listing='.$row['property_id'].'">'.$row['title'].'</a></h3></li>
<ul class="list-inline"><li> <i class="fa fa-location-arrow"></i> '.$row['location'].'</li>
<li> <i class="fa fa-tags"></i> '.$row['property_type'].'</li></ul>
   <ul class="list-inline">
     <li> <i class="fa fa-usd"></i> '.$row['price'].'</li>
     <li>  <i class="fa fa-phone"></i> '.$row['contact'].'</li>
     <li><i class="fa fa-envelope"></i> <a href="mailto:'.$row['email'].'">  '.$row['email'].'</a></li>
   </ul>
   <li>
     <ul class="list-inline">
       <li class=""><i class="fa fa-home"></i><a href="#"> Size</a></li>
       <li class=""><i class="fa fa-automobile"></i><a href="#"> Garage size</a></li>
       <li class=""><i class="fa fa-bed"></i><a href="#"> 2 Bedrooms</a></li>
     </ul>

     <ul class="list-inline">
     <li class="">Open from 6am - 8pm for viewing</li>

     </ul>

   </li>
 </ul>
 </div>

 <div class=" col-sm-4 col-md-12">
    <ul class="list-inline">
     <li class="pull-left">
       <span class="glyphicon glyphicon-hourglass"></span>&nbsp;
       Property Status
      </li>
     <li class="pull-right">
          <a href="view-listing?listing='.$row['property_id'].'" class="btn btn-primary">
               <span class="fa fa-folder-open-o"> </span>&nbsp;View Listing
             </a>
     </li>
    </ul>
 </div>
</div>';
# code...
}else{
  echo '<div> <p>You haven\'t posted anything yet </p</div>';
}
}

//Property listings
function property_list(){
include 'dbconnect.php';

$query="select * from properties ";
$result=mysqli_query($dbc,$query);


while($row=mysqli_fetch_array($result)){
echo
'
<div class="property-listing listing">
<div class="col-md-4 thumbnail " id="image-gallery"">
<a href="'.$row['images'].'"><img class="img-responsive" src="'.$row['images'].'" /></a>
</div>

 <div class=" col-sm-4 col-md-8 user-listing">
         <ul class="">
              <li><h3><a href="view-listing?listing='.$row['property_id'].'">'.$row['title'].'</a></h3></li>
            <ul class="list-inline"><li> <i class="fa fa-location-arrow"></i> '.$row['location'].'</li>
<li> <i class="fa fa-tags"></i> '.$row['property_type'].'</li></ul>
               <ul class="list-inline">
                 <li> <i class="fa fa-usd"></i> '.$row['price'].'</li>
                 <li>  <i class="fa fa-phone"></i> '.$row['contact'].'</li>
                 <li><i class="fa fa-envelope"></i> <a href="mailto:'.$row['email'].'">  '.$row['email'].'</a></li>
           </ul>
               <li>
                 <ul class="list-inline">
                   <li class=""><i class="fa fa-home"></i><a href="#"> Size</a></li>
                   <li class=""><i class="fa fa-automobile"></i><a href="#"> Garage size</a></li>
                   <li class=""><i class="fa fa-bed"></i><a href="#"> 2 Bedrooms</a></li>
                 </ul>

                 <ul class="list-inline">
                 <li class="">Open from 6am - 8pm for viewing</li>

                 </ul>

               </li>
       </ul>
 </div>

 <div class=" col-sm-4 col-md-12">
        <ul class="list-inline">
         <li class="pull-left">
           <span class="fa fa-tags "></span>&nbsp;
          '.ucfirst($row['status']).'
          </li>
         <li class="pull-right">

             <a href="view-listing?listing='.$row['property_id'].'" class="btn btn-primary">
               <span class="fa fa-folder-open-o"> </span>&nbsp;View Listing
             </a>
         </li>
        </ul>
 </div>
 </div>
';
}
}
// ////
//updating user profile
function user_update(){
  include 'dbconnect.php';
  @include 'session.php';

  if($_POST){
    $fname=mysqli_escape_string($dbc,$_POST['name']);

  	$email=mysqli_escape_string($dbc,$_POST['email']);
    $contact=$_POST['contact'];

  			$query= "update users SET contact='$contact' , first_name='$fname', email='$email' where email='$user'";
  			$query2="update properties SET contact='$contact' ,owner='$fname', email='$email' where email='$user'";
  			$result=mysqli_query($dbc,$query);
  			$result2=mysqli_query($dbc,$query2);

        if($result && $result2){
          echo '<p class="alert alert-success text-center">Your profile has been updated <span class="close pull-right"> <span class="close pull-right"> <a href="#" >&times; </a></span></p>';

        }else{
          echo '<p class="alert alert-danger">My bad!!! Something went totally wrong. Try again later while i try to fix it <span class="close pull-right"> <span class="close pull-right"> <a href="#" >&times; </a></span></p>';

        }
      }
    }
//

function specificClassify(){

  include 'dbconnect.php';
  $listing=$_GET['listing'];

  $query="select * from properties where property_id='$listing' ";
  $result=mysqli_query($dbc,$query);


  while($row=mysqli_fetch_array($result)){
  echo '<div class="col-md-4 thumbnail " id="image-gallery"">
<a href="'.$row['images'].'"><img class="img-responsive" src="'.$row['images'].'" /></a>
  </div>

   <div class=" col-sm-4 col-md-8 user-listing">
           <ul class="">
                <li><h3><a href="view-listing?listing='.$row['property_id'].'">'.$row['title'].'</a></h3></li>
              <ul class="list-inline"><li> <i class="fa fa-location-arrow"></i> '.$row['location'].'</li>
<li> <i class="fa fa-tags"></i> '.$row['property_type'].'</li></ul>
                 <ul class="list-inline">
                   <li> <i class="fa fa-usd"></i> '.$row['price'].'</li>
                   <li>  <i class="fa fa-phone"></i> '.$row['contact'].'</li>
                   <li><i class="fa fa-envelope"></i> <a href="mailto:'.$row['email'].'">  '.$row['email'].'</a></li>
             </ul>
                 <li>
                   <ul class="list-inline">
                     <li class=""><i class="fa fa-home"></i><a href="#"> Size</a></li>
                     <li class=""><i class="fa fa-automobile"></i><a href="#"> Garage size</a></li>
                     <li class=""><i class="fa fa-bed"></i><a href="#"> 2 Bedrooms</a></li>
                   </ul>

                   <ul class="list-inline">
                   <li class="">Open from 6am - 8pm for viewing</li>

                   </ul>

                 </li>
         </ul>
   </div>

   <div class=" col-sm-4 col-md-12">
          <ul class="list-inline">
           <li class="pull-left">
             <span class="fa fa-tags "></span>&nbsp;
            '.ucfirst($row['status']).'
            </li>
           <li class="pull-right">

               <a href="#" class="btn btn-primary">
                 <span class="fa fa-folder-open-o"> </span>&nbsp;View Listing
               </a>
           </li>
          </ul>
   </div>


   <div class="col-sm-4 col-md-12">
   <h3 class="page-header">description</h3>

'.$row['description'].'

   </div>
  ';
}
}

//property category
function category_listing(){
  include 'dbconnect.php';
$category=$_GET['category'];
  $query="select * from properties where property_type='$category' ";
  $result=mysqli_query($dbc,$query);



    if(mysqli_num_rows($result)==1){

    while($row=mysqli_fetch_array($result)){

  echo
  '
  <div class="property-listing">
  <div class="col-md-4 thumbnail " id="image-gallery"">
  <a href="'.$row['images'].'"><img class="img-responsive" src="'.$row['images'].'" /></a>
  </div>

   <div class=" col-sm-4 col-md-8 user-listing">
           <ul class="">
                <li><h3><a href="view-listing?listing='.$row['property_id'].'">'.$row['title'].'</a></h3></li>
              <ul class="list-inline"><li> <i class="fa fa-location-arrow"></i> '.$row['location'].'</li>
<li> <i class="fa fa-tags"></i> '.$row['property_type'].'</li></ul>

                 <ul class="list-inline">
                   <li> <i class="fa fa-usd"></i> '.$row['price'].'</li>
                   <li>  <i class="fa fa-phone"></i> '.$row['contact'].'</li>
                   <li><i class="fa fa-envelope"></i> <a href="mailto:'.$row['email'].'">  '.$row['email'].'</a></li>
             </ul>
                 <li>
                   <ul class="list-inline">
                     <li class=""><i class="fa fa-home"></i><a href="#"> Size</a></li>
                     <li class=""><i class="fa fa-automobile"></i><a href="#"> Garage size</a></li>
                     <li class=""><i class="fa fa-bed"></i><a href="#"> 2 Bedrooms</a></li>
                   </ul>

                   <ul class="list-inline">
                   <li class="">Open from 6am - 8pm for viewing</li>

                   </ul>

                 </li>
         </ul>
   </div>

   <div class=" col-sm-4 col-md-12">
          <ul class="list-inline">
           <li class="pull-left">
             <span class="fa fa-tags "></span>&nbsp;
            '.ucfirst($row['status']).'
            </li>
           <li class="pull-right">

               <a href="view-listing?listing='.$row['property_id'].'" class="btn btn-primary">
                 <span class="fa fa-folder-open-o"> </span>&nbsp;View Listing
               </a>
           </li>
          </ul>
   </div>
   </div>
  ';
}
}else{
  echo '<p class="text-center lead"> Bummer!!! Nothing listed in this category. </p>';
}
  }
