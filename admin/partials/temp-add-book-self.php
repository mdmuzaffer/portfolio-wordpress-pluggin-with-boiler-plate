<div class="container" style="margin-top:10px">
    <div class="panel panel-primary">
       <div class="panel-heading">Create Books Self
       		<button class="btn btn-info" id="ajax_request_first" style="float: right; margin-top:-7px;">Ajax request</button>
       </div>
      	<div class="row">
      		<div class="col-sm-12">
      			<br>
		      	<form class="form-horizontal" action="javascript:void(0)" id="form-create-book-self">
		      		<div class="form-group">
				      <label class="control-label col-sm-2" for="name">Name:</label>
				      <div class="col-sm-5">
				        <input type="text" class="form-control" required id="name" placeholder="Enter Name" name="name">
				      </div>
				      </div>
				      <div class="form-group">
				      <label class="control-label col-sm-2" for="Capacity">Capacity:</label>
				      <div class="col-sm-5">
				        <input type="number" class="form-control" required id="capacity" placeholder="Enter Capacity" name="capacity">
				      </div>
				    </div>

				    <div class="form-group">
				      <label class="control-label col-sm-2" for="Location">Location:</label>
				      <div class="col-sm-5">
				        <input type="text" class="form-control" required id="location" placeholder="Enter Location" name="location">
				      </div>
				    </div>

				     <div class="form-group">
				      <label class="control-label col-sm-2" for="image">Status:</label>
				      <div class="col-sm-4">
				        <select class="form-select" aria-label="Default select example" name="status">
							<option selected value="1">Active</option>
							<option value="0">Inactive</option>
						</select>
				      </div>
				      </div>
				      	<div class="form-group">
				      		<div class="col-sm-2"></div>
					       <div class="col-sm-4">
					         <input type="submit" name="submit" value="Submit"  class="btn btn-info">
					       </div>
				    	</div>
				</form>
	  		</div>
	    </div>
	</div>
</div>

