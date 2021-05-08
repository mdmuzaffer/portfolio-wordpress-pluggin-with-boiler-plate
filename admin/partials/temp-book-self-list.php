<div class="container" style="margin-top:10px">
    <div class="panel panel-primary">
       <div class="panel-heading">Book List Self</div>
      	<div class="row">
      		<div class="col-sm-12">
      			<br>
      			<table id="example" class="table table-striped table-bordered" style="width:100%">
			        <thead>
			            <tr>
			                <th>#ID</th>
			                <th>Name</th>
			                <th>Capacity</th>
			                <th>Location</th>
			                <th>Status</th>
			                <th>Action</th>
			            </tr>
			        </thead>
			        <tbody>
			        	<?php 
			        		if (!empty($bookData)) {

			        		foreach ($bookData as $key => $book) {
			        		?>
			        		<tr>
				                <td><?php echo $book->id ?></td>
				                <td><?php echo strtoupper($book->self_name) ?></td>
				                <td><?php echo $book->capacity ?></td>
				                <td><?php echo $book->self_location ?></td>
				                <?php 
				                	if ($book->status ==1) { ?>
				                		<td><button class="btn btn-info">Active</button></td>
				                <?php }else{?>
				                		<td><button class="btn btn-warning">Inactive</button></td>
				               <?php  } ?>

				                 <td><button class="btn btn-danger" id="self-book-delete" book_self_id="<?php echo $book->id ?>">Delete</button></td>
			            	</tr>
			            	<?php 
			            	}

			        		}else{


			        		}
			        	?>

			          
			        </tbody>
			        <tfoot>
			            <tr>
			                <th>#ID</th>
			                <th>Name</th>
			                <th>Capacity</th>
			                <th>Location</th>
			                <th>Status</th>
			                <th>Action</th>
			                
			            </tr>
			        </tfoot>
			    </table>
      		</div>
      	</div>
    </div>
</div>

<script type="text/javascript">
	
jQuery(document).ready(function() {
jQuery('#example').DataTable();
} );
</script>