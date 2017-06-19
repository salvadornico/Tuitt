<?php 

	// Set to apply active Bootstrap class to nav link
	$active_page = "Breeds";
	require_once "res/bunny-template.php"; 

?>

<a href="bunnies.php">
	<button class="btn"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;&nbsp;Back</button>
</a>

<?php

	$current_bunny = $_GET['id'];

	print_single_bunny($bunnies[$current_bunny]);

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

		if ($name) {
			$bunnies[$current_bunny]['name'] = $name;
		}
		if ($weight) {
			$bunnies[$current_bunny]['weight'] = $weight;
		}
		if ($description) {
			$bunnies[$current_bunny]['description'] = $description;
		}
		if ($category) {
			$bunnies[$current_bunny]['category'] = $category;
		}
		if ($img) {
			$bunnies[$current_bunny]['img'] = $img;
		}


		$fp = fopen('res/bunnies.json', 'w');
		fwrite($fp, json_encode($bunnies, JSON_PRETTY_PRINT));
		fclose($fp);
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
							<input type="text" class="form-control" name="name" id="name" value="<?php echo $bunnies[$current_bunny]['name']; ?>">
						</div>
					</div>

	      			<div class="form-group">
						<label class="control-label col-md-4" for="weight">Weight:</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="weight" id="weight" value="<?php echo $bunnies[$current_bunny]['weight']; ?>">
						</div>
					</div>

					<div class="form-group">
							<label for="description">Description:</label>
							<textarea class="form-control" rows="5" name="description" id="description"><?php echo $bunnies[$current_bunny]['description']; ?></textarea>
					</div>

					<div class="form-group">
						<label class="control-label col-md-4" for="category">Region:</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="category" id="category" value="<?php echo $bunnies[$current_bunny]['category']; ?>">
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