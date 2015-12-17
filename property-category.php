<?php include 'header.php' ?>



	<div class="container">
	<div class="col-md-4">

		<div class="col-sm-4 col-md-12">
			<div  class=" panel panel-default">

				<div class="panel-heading">
						<div class="panel-title">
							Property Type
						</div>
					</div>
				 <ul class="list-group property_type">
					 		<?php property_type(); ?>
		  		</ul>
			</div>

		</div>

		<!-- /property type -->




		<div class="col-sm-4 col-md-12 ">
			<div  class=" panel panel-default">

				<div class="panel-heading">
						<div class="panel-title">
							Ad Space
						</div>
					</div>
					<div class="property-body">
				<h3 style="padding:1%">This ad space is for hire</h3>
		  		
		  			</div>
			</div>

		</div>

	</div>
<!--  end of sidebar-->

	<div class="col-sm-4 col-md-8 ">
	
				<div class="col-sm-4 col-md-12">

					<div class="property-listing listing col-md-12">
						<?php category_listing(); ?>
					</div>
				</div>
<!--end of listing  -->

<!--end of container-->
	</div>
<!--	row ending-->
</div>
</div>
</div>



<?php include 'footer.php' ?>
