<?php include 'header.php' ?>

<div class="container">

  <div class="col-md-offset-3 col-md-6">
    <ul class="breadcrumb text-center">
      <li>  <a href="new-property"  >List New Property</a></li>
      <li><a href=""  >View My Properties</a></li>
      <li><a href="member"  >Update My Profile</a></li>
    </ul>

      <form class="form-horizontal" role="form" action="" method="">
            <div class="form-group">
              <input type="text" name="name" value="" placeholder="Posting As?" class="form-control">
            </div>
            <div class="form-group">
              <input type="email" name="email" value="" placeholder="your contact email" class="form-control">
            </div>
            <div class="form-group">
              <input type="contact" name="contact" value="" placeholder="Your contact number" class="form-control">
            </div>
            <div class="form-group">
              <input type="text" name="title" value="" placeholder="Give me a title" class="form-control">
            </div>
            <div class="form-group">
              <input type="location" name="name" value="" placeholder="Select a location fro your property" class="form-control">
            </div>
            <div class="form-group">
              <input type="Price" name="name" value="" placeholder="From $" class="form-control">
            </div>
            <div class="form-group">
              <textarea name="desctiption" rows="8" cols="40" class="form-control"></textarea>
            </div>

            <div class="form-group">
              <button type="submit" name="button" class="btn btn-block btn-primary"><i class="fa fa-plane"></i>&nbsp;Fire Up</button>
            </div>
      </form>
    </div>
</div>


<?php include 'footer.php' ?>
