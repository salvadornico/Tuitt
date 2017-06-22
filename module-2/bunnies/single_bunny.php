<?php 

	// Set to apply active Bootstrap class to nav link
	$active_page = "Breeds";
	require_once "res/bunny-template.php"; 

?>

<a href="bunnies.php">
	<button class="btn"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;&nbsp;Back</button>
</a>

<?php

	$current_bunny_id = $_GET['id'];

	print_single_bunny($current_bunny_id);

	if(isset($_SESSION['user'])) {
		echo '<button class="btn" data-toggle="modal" data-target="#editBunnyModal">
				<span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit Info</button>';
	}

	// Edit bunny
	if (isset($_POST['edit_bunny'])) {
		$name = $_POST['name'];
		$weight = $_POST['weight'];
		$description = $_POST['description'];
		$category = $_POST['category'];
		$img = $_POST['img'];

		$sql = "";
		if ($name) {
			// Append SQL query to $sql
			$sql .= "UPDATE bunnydetails SET name = '$name' WHERE id = $current_bunny_id;";
		}
		if ($weight) {
			$sql .= "UPDATE bunnydetails SET weight = '$weight' WHERE id = $current_bunny_id;";
		}
		if ($description) {
			$sql .= "UPDATE bunnydetails SET description = '$description' WHERE id = $current_bunny_id;";
		}
		if ($category) {
			$sql .= "UPDATE bunnydetails SET category = '$category' WHERE id = $current_bunny_id;";
		}
		if ($img) {
			$sql .= "UPDATE bunnydetails SET img = '$img' WHERE id = $current_bunny_id;";
		}

		mysqli_multi_query($conn, $sql);
	}

?>

<!-- Edit bunny modal -->
<div id="editBunnyModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">

	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h4 class="modal-title">Edit Bunny</h4>
	      	</div>

	      	<div class="modal-body">
	        	<form method="POST" class="form-horizontal">

	      			<div class="form-group">
						<label class="control-label col-md-4" for="name">Name:</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="name" id="name" value="<?php echo $current_name; ?>">
						</div>
					</div>

	      			<div class="form-group">
						<label class="control-label col-md-4" for="weight">Weight:</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="weight" id="weight" value="<?php echo $current_weight; ?>">
						</div>
					</div>

					<div class="form-group">
							<label for="description">Description:</label>
							<textarea class="form-control" rows="5" name="description" id="description"><?php echo $current_description; ?></textarea>
					</div>

					<div class="form-group">
						<label class="control-label col-md-4" for="category">Region:</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="category" id="category" value="<?php echo $current_category; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-4" for="img">Image:</label>
						<div class="col-md-6">
							<input type="file" class="form-control" name="img" id="img" placeholder="Choose an image">
						</div>
					</div>

					<div class="form-group"> 
						<div class="col-md-12">
							<input type="submit" class="btn btn-primary" id="edit_bunny_button" name="edit_bunny" value="Submit">
						</div>
					</div>

	      		</form>
	      	</div> <!-- /modal body -->

	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      	</div>

	    </div> <!-- /modal content -->
	</div> <!-- /modal dialog -->
</div> <!-- /edit bunny modal -->

<?php require_once "res/footer.php"; ?>