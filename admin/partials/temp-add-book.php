<?php
	wp_enqueue_media();
?>
<div class="container" style="margin-top:10px">
    <div class="panel panel-primary">
       <div class="panel-heading">Add Books</div>
      	<div class="row">
      		<div class="col-sm-12">
      			<br>
		      	<form class="form-horizontal" action="javascript:void(0)" id="add_book_details">
		      		<div class="form-group">
				      	<label class="control-label col-sm-2" for="name">Choose Self:</label>
					      	<div class="col-sm-5">
					       		<select class="form-select mb-5" aria-label="Default select example" name="self_book" required>
									<option selected>Select Book</option>
									<?php 
									if (count($bookself) >0) {
										
										foreach($bookself as $selfid) { ?>
										    <option value="<?= $selfid->id ?>"><?= $selfid->self_name ?></option>
										<?php } 
									}
									?>
									</select>
					     	</div>
				    </div>

		      		<div class="form-group">
				      <label class="control-label col-sm-2" for="name">Name:</label>
				      <div class="col-sm-5">
				        <input type="text" required class="form-control" id="name" placeholder="Enter Name" name="name">
				      </div>
				      </div>


				      <div class="form-group">
				      <label class="control-label col-sm-2" for="email">Email:</label>
				      <div class="col-sm-5">
				        <input type="email" required class="form-control" id="email" placeholder="Enter Email" name="email">
				      </div>
				    </div>


				    <div class="form-group">
				      <label class="control-label col-sm-2" for="publication">Publication:</label>
				      <div class="col-sm-5">
				        <input type="text" required class="form-control" id="publication" placeholder="Enter Publication" name="publication">
				      </div>
				    </div>

				    <div class="form-group">
				      <label class="control-label col-sm-2" for="description">Description:</label>
				      <div class="col-sm-5">          
				        <textarea class="form-control" required id="description" placeholder="Enter Description" name="description"  rows="4" cols="50"></textarea>
				      </div>
				    </div>

				    <div class="form-group">
					    <label class="control-label col-sm-2" for="image">Selected Image:</label>
					    <div class="col-sm-5">
					       <img src="http://localhost/wordpress/wp-content/uploads/2021/04/download.jpg" alt="Select Image" id="previewImage" width="80" height="60">
					    </div>
				    </div>

				    <div class="form-group">
				      <label class="control-label col-sm-2" for="image">Book Image:</label>
				      <div class="col-sm-5">
				        <input type="button" class="btn btn-info" value="Book Image" id="imageSelect">
				        <input type="hidden" class="form-control" name="image_url" value="" id="image_url">
				      </div>
				    </div>

				     <div class="form-group">
					      <label class="control-label col-sm-2" for="book-cost">Book Cost:</label>
					      <div class="col-sm-4">
					        <input type="text" required class="form-control" id="cost" placeholder="Enter Cost" name="cost">
					      </div>
				    </div>


				     <div class="form-group">
				      <label class="control-label col-sm-2" for="image">Status:</label>
				      <div class="col-sm-4">
				        <select class="form-select" aria-label="Default select example" required name="status">
							<option selected value="1">Active</option>
							<option value="0">Inactive</option>
						</select>
				      </div>
				      </div>
				      	<div class="form-group">
				      		<div class="col-sm-2"></div>
					       <div class="col-sm-4">
					         <button type="submit" class="btn btn-info">Submit</button>
					       </div>
				    	</div>
				</form>
	  		</div>
	    </div>
	</div>
</div>

