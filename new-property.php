<?php include 'header.php' ?>
<?php if(!isset($user)){
  header("location:login");
} ?>
<div class="container">

  <div class="col-md-offset-3 col-md-6 ">

    <ul class="breadcrumb text-center">
      <li>  <a href="new-property" ><i class="fa fa-bars"></i>&nbsp;List New Property</a></li>
      <li><a href="user-listing"  ><i class="fa fa-bars"></i>&nbsp;View My Properties</a></li>
      <li><a href="member"  ><i class="fa fa-bars"></i>&nbsp;Update My Profile</a></li>
    </ul>

    <div class="alert my-alert">
        <?php new_listing(); ?>
    </div>
      <h3 class="page-header text-info">List Your Property</h3>

      <form class="form-horizontal property-single" style="padding:7%" role="form" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post">
            <div class="form-group">
              <label for="name">Posting As?</label>
              <input type="text" name="name" value="<?php echo $row['first_name'] ?>" placeholder="Posting As?" class="form-control" required>
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
              <input type="text" name="title" value="" placeholder="Give me a title" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="action">Property Status</label>
              <select name="status" class="form-control" required>
              <option select="" value="">Rent / Sale or Share</option>
            <?php


                                    $query="select * from property_status";
                                      $result=mysqli_query($dbc,$query);

                                        while($status=mysqli_fetch_array($result)){
                              $status=$status['status_name'];
                          echo '<option  >'."$status".'</option>';}
                      ?>
              </select>
            </div>

            <div class="form-group">
              <label for="location"> Property Location</label>
              <select name="location" class="form-control" required>
              <option select="" value="">Your Property Location</option>
            <?php


                                    $query="select * from locations order by region ASC";
                                      $result=mysqli_query($dbc,$query);

                                        while($location=mysqli_fetch_array($result)){
                              $location=$location['region'];
                          echo '<option  >'."$location".'</option>';}
                      ?>
              </select>
            </div>

            <div class="form-group">
              <label for="type"> Property Type</label>
              <select name="type" class="form-control" required>
              <option select="" value="">Your Property Type</option>
            <?php


                                    $query="select * from property_type ";
                                      $result=mysqli_query($dbc,$query);

                                        while($location=mysqli_fetch_array($result)){
                              $location=$location['type_name'];
                          echo '<option  >'."$location".'</option>';}
                      ?>
              </select>
            </div>

             <div class="form-group">
               <div class=" col-md-12">
                  <div class="col-md-6">
                  <label for="bedroom">Bedrooms</label>
                  <input type="text" name="bedroom" value="" placeholder=" i.e 2 for 2 Bedrooms" class="form-control" required>
                  </div>  

                  <div class="col-md-6">
                  <label for="gsize">Garage size</label>
                  <input type="text" name="gsize" value="" placeholder=" i.e 2 for 2 cars" class="form-control" required>
                  </div>
                </div>
            </div>


            <div class="form-group">
              <label for="price">Property Value</label>
              <input type="text" name="price" value="" placeholder="From $" class="form-control" required>
            </div>

            <div class="form-group">
                  <label for="price">Add Image</label>
                	<input type="file" name="uploadedfile" class="form-control " />
                	<input type="hidden" name="MAX_FILE_SIZE" value="100000">
	         </div>

            <div class="form-group">
              <label for="description">Give some details</label>
              <textarea name="description" rows="8" cols="40" class="form-control" required></textarea>
            </div>

            <div class="form-group">
              <button type="submit" name="button" class="btn btn-block btn-primary"><i class="fa fa-paper-plane"></i>&nbsp;Fire Up</button>
            </div>
      </form>
    </div>
</div>


<?php include 'footer.php' ?>
