<div class="jumbotron text-center">

			<h1>Bunnies</h1>

			<p>
				<img src="images/emoji.png">
				<img src="images/emoji.png">
				<img src="images/emoji.png">
			</p>

			<!-- Animated JS/CSS grass (refer to script.js) -->
			<div class="grass"></div>

		</div> <!-- /jumbotron -->

		<nav class="navbar navbar-default">
  			<div class="container-fluid">

    			<ul class="nav navbar-nav">

      				<?php

      					foreach ($nav_sections as $section) {
      						print_nav($section[0], $section[1]);
      					}

      				?>

    			</ul>

    			<?php
    				
    				// if no login detected
	    			if(!isset($_SESSION['user'])) {

	    				// Register Button
	    				echo "<div class='navbar-form navbar-right'>
								<button type='button' class='btn btn-success' name='register' data-toggle='modal' data-target='#registerModal'>Register</button>
								</div>";

						// Login Form
						echo '<form method="POST" class="navbar-form navbar-right" action="members.php">
			      				<div class="form-group">
			        				<input type="text" class="form-control" name="username" placeholder="Username">
			        				<input type="password" class="form-control" name="password" placeholder="Password">
			      				</div>
			      				<button class="btn btn-primary" name="submit_login" value="Login">
									Login
								</button>
			    				</form>';						
					} else {
						// Greeting & logout button
						echo '<form method="POST" class="navbar-form navbar-right" action="logout.php">
								<p class="navbar-text">You are logged in as ';
						echo $_SESSION['user'];
						echo '</p>
								<button class="btn btn-warning" name="logout" value="Logout">
									Logout&nbsp;&nbsp;<span class="glyphicon glyphicon-log-out"></span>
								</button>
								</form>';
					}

    			?>

    			<!-- New user registration modal -->
    			<div id="registerModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
				    	<!-- Modal content-->
					    <div class="modal-content">

					      	<div class="modal-header">
					        	<button type="button" class="close" data-dismiss="modal">&times;</button>
					        	<h4 class="modal-title">Create A New Account</h4>
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
										<label class="control-label col-md-4" for="password">Password:</label>
										<div class="col-md-6">
	  										<input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
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
	  										<input type="submit" class="btn btn-primary disabled submit_button" name="register_user" value="Submit">
										</div>
									</div>

					      		</form>

					      	</div> <!-- /modal body -->

					      	<div class="modal-footer">
					        	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
					      	</div>

					    </div> <!-- /modal content -->
				    </div> <!-- /modal dialog -->
				</div> <!-- /new user modal -->

  			</div> <!-- /navbar's container-fluid -->

		</nav>