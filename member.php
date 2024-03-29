<?php include 'header.php' ?>
<?php if(!isset($user)){
  header("location:login");
} ?>
<?php user_update();?>
<div class="container">


  <div class="col-md-offset-3 col-md-6">

    <ul class="breadcrumb text-center">
      <li>  <a href="new-property" ><i class="fa fa-bars"></i>&nbsp;List New Property</a></li>
      <li><a href="user-listing"  ><i class="fa fa-bars"></i>&nbsp;View My Properties</a></li>
      <li><a href="member"  ><i class="fa fa-bars"></i>&nbsp;Update My Profile</a></li>
    </ul>
    <h3 class="page-header text-info">Update My Profile</h3>
      <form class="form-horizontal property-single" style="padding:7%" role="form" id="member-profile" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="company">Your Name</label>
              <input type="text" name="name" value="<?php echo $row['first_name'] ?>" required placeholder="Posting As?" class="form-control">
            </div>
            <div class="form-group">
                <label for="company">Your email</label>
              <input type="email" name="email" value="<?php echo $row['email'] ?>" required placeholder="your contact email" class="form-control">
            </div>
            <div class="form-group">
                <label for="contact">Your contact number</label>
              <input type="contact" name="contact" value="<?php echo $row['contact'] ?>" required placeholder="Your contact number" class="form-control">
            </div>

            <div class="form-group">
              <label for="company">Company Name (Optional)</label>
              <input type="text" name="company" value="" placeholder="Your Company" class="form-control">
            </div>


            <div class="form-group">
              <button type="submit" name="button" class=" btn-primary btn btn-block"><i class="fa fa-save"></i>&nbsp;Update</button>
            </div>
      </form>
    </div>
</div>


<?php include 'footer.php' ?>
