<?php include 'header.php' ?>
<?php if(!isset($user)){
  header("location:index");
} ?>
<div class="container">

  <div class="col-md-offset-3 col-md-6">
    <ul class="breadcrumb text-center">
      <li>  <a href="new-property"  >List New Property</a></li>
      <li><a href=""  >View My Properties</a></li>
      <li><a href="member"  >Update My Profile</a></li>
    </ul>

      <form class="form-horizontal" role="form" action="" method="">
            <div class="form-group">
              <label for="name">Posting As?</label>
              <input type="text" name="name" value="<?php echo $row['first_name'] ?>" placeholder="Posting As?" class="form-control">
            </div>
            <div class="form-group">
              <label for="email"> Email</label>
              <input type="email" name="email" value="<?php echo $row['email'] ?>" placeholder="your contact email" class="form-control">
            </div>
            <div class="form-group">
              <label for="contact">Contact</label>
              <input type="contact" name="contact" value="<?php echo $row['contact'] ?>" placeholder="Your contact number" class="form-control">
            </div>
            <div class="form-group">
              <label for="title">Name  Listing</label>
              <input type="text" name="title" value="" placeholder="Give me a title" class="form-control">
            </div>
            <div class="form-group">
              <label for="location"> Property Location</label>
              <input type="text" name="location" value="" placeholder="Select a location fro your property" class="form-control">
            </div>
            <div class="form-group">
              <label for="contact">Property Value</label>
              <input type="text" name="price" value="" placeholder="From $" class="form-control">
            </div>
            <div class="form-group">
              <label for="description">Give some details</label>
              <textarea name="desctiption" rows="8" cols="40" class="form-control"></textarea>
            </div>

            <div class="form-group">
              <button type="submit" name="button" class="btn btn-block btn-primary"><i class="fa fa-plane"></i>&nbsp;Fire Up</button>
            </div>
      </form>
    </div>
</div>


<?php include 'footer.php' ?>
