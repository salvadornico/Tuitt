<?php 

	// Set to apply active Bootstrap class to nav link
	$active_page = "Members Section";
	require_once "res/bunny-template.php"; 

?>

<h1>Members Only</h1>

<?php

	if(!isset($_SESSION['user'])) {
		echo "<p>Members, please log in above.</p>";
		echo "<p>Otherwise, you may have entered the wrong login credentials. Please try again.</p>";

	} else {
		echo "<p>Welcome, ";
		echo $_SESSION['user'] . "</p>";
		echo '<p><button class="btn btn-success" data-toggle="modal" data-target="#newBunnyModal"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Add new bunny</button></p>';
		echo '<p><button class="btn btn-info" data-toggle="modal" data-target="#editUserModal"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Account Settings</button></p>';

	}

?>

<!-- New bunny modal -->
<div id="newBunnyModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">

	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h4 class="modal-title">Add New Bunny</h4>
	      	</div>

	      	<div class="modal-body">
	        	<form method="POST" class="form-horizontal" action="bunnies.php">

	      			<div class="form-group">
						<label class="control-label col-md-4" for="name">Name:</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
						</div>
					</div>

	      			<div class="form-group">
						<label class="control-label col-md-4" for="weight">Weight:</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="weight" id="weight" placeholder="Enter weight">
						</div>
					</div>

					<div class="form-group">
							<label for="description">Description:</label>
							<textarea class="form-control" rows="5" name="description" id="description" placeholder="Describe the bunny"></textarea>
					</div>

					<div class="form-group">
						<label class="control-label col-md-4" for="category">Region:</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="category" id="category" placeholder="Enter region of origin">
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
							<input type="submit" class="btn btn-success" id="new_bunny_button" name="add_bunny" value="Submit">
						</div>
					</div>

	      		</form>
	      	</div> <!-- /modal body -->

	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	      	</div>

	    </div> <!-- /modal content -->
	</div> <!-- /modal dialog -->
</div> <!-- /new bunny modal -->

<!-- New user registration modal -->
<div id="editUserModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
    	<!-- Modal content-->
	    <div class="modal-content">

	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h4 class="modal-title">Change Password</h4>
	      	</div>

	      	<div class="modal-body">
	        	
	      		<form method="POST" class="form-horizontal">

	      			<div class="form-group">
						<label class="control-label col-md-4" for="username">Username:</label>
						<div class="col-md-6">
								<input type="text" class="form-control username_field" name="username" id="username" placeholder="Enter username">
						</div>
					</div>

	      			<div class="form-group">
						<label class="control-label col-md-4" for="old_password">Old Password:</label>
						<div class="col-md-6">
								<input type="password" class="form-control" name="old_password" id="old_password" placeholder="Enter old password">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-4" for="new_password">New Password:</label>
						<div class="col-md-6">
								<input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter new password">
						</div>
						<div class="col-md-2 password_warning"></div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-4" for="confirm_password">Confirm password:</label>
						<div class="col-md-6">
								<input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm password">
						</div>
						<div class="col-md-2 confirm_password_warning"></div>
					</div> 		

					<div class="form-group"> 
						<div class="col-md-12">
								<input type="submit" class="btn btn-primary disabled submit_button" name="edit_user" value="Submit">
						</div>
					</div>

	      		</form>

	      	</div> <!-- /modal body -->

	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
	      	</div>

	    </div> <!-- /modal content -->
    </div> <!-- /modal dialog -->
</div> <!-- /edit user modal -->

<?php require_once "res/footer.php"; ?>