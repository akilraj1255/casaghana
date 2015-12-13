<?php include 'header.php' ?>
<?php if(!isset($user)){
  header("location:index");
} ?>
<div class="container">
  <div class="col-md-offset-3 col-md-6">
    <ul class="breadcrumb text-center">
      <li>  <a href="new-property" ><i class="fa fa-bars"></i>&nbsp;List New Property</a></li>
      <li><a href="user-listing"  ><i class="fa fa-bars"></i>&nbsp;View My Properties</a></li>
      <li><a href="member"  ><i class="fa fa-bars"></i>&nbsp;Update My Profile</a></li>
    </ul>
<h3 class="page-header">Your Property Listing</h3>
   </div>


   <div class="col-md-offset-3 col-md-6  property-single">
      <?php user_listings(); ?>
  </div>

</div>


<?php include 'footer.php' ?>
