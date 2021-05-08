<div class="container" style="margin-top:10px">
    <div class="panel panel-primary">
       <div class="panel-heading">Book List</div>
      	<div class="row">
      		<div class="col-sm-12">
      			<br>
      			<table id="example" class="table table-striped table-bordered" style="width:100%">
			        <thead>
			            <tr>
			            	<th>#ID</th>
			                <th>Name</th>
			                <th>Self Name</th>
			                <th>Email</th>
			                <th>Publication</th>
			                <th>Image</th>
			                <th>Book Cost</th>
			                <th>Status</th>
			                <th>Action</th>
			            </tr>
			        </thead>
			        <tbody>
			        	<?php 
			        	foreach ($bookData as $key => $book) {?>
			            <tr>
			            	<td><?php echo $book->id; ?></td>
			                <td><?php echo strtoupper($book->name); ?></td>
			                <td><?php echo strtoupper($book->self_name); ?></td>
			                <td><?php echo $book->email; ?></td>
			                <td><?php echo !empty($book->publication) ? $book->publication: "<i>No Publication</i>"; ?></td>
			                <td><?php if(!empty($book->book_image)){?><img src="<?php echo $book->book_image; ?>" style="width:50px; height:50px;"/><?php }else{echo "No Image";}?></td>
			                <td><?php echo $book->amount; ?></td>

			                <td><?php if(!empty($book->status)){ ?>
			                <button class="btn btn-info">Active</button>
			            	<?php } else{ ?>
			                <button class="btn btn-danger">Inactive</button><?php } ?></td>
			                <td><button class="btn btn-danger" id="book_list_delete" book_list_id="<?php echo $book->id; ?>">Delete</button></td>
			            </tr>
			            <?php }?>
			        </tbody>
			        <tfoot>
			            <tr>
			            	<th>#ID</th>
			                <th>Name</th>
			                <th>Self Name</th>
			                <th>Email</th>
			                <th>Publication</th>
			                <th>Description</th>
			                <th>Image</th>
			                <th>Book Cost</th>
			                <th>Status</th>
			                
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