<?php require_once "bunny_lib.php"; ?>

<!DOCTYPE html>
<html>

	<head>

		<title>Bunnies</title>

		<link href="https://fonts.googleapis.com/css?family=Open+Sans|Pangolin" rel="stylesheet">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="bunnies.css">

		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	</head>

	<body>

		<div class="jumbotron text-center">

			<h1>Bunnies</h1>

			<p>
				<img src="images/emoji.png">
				<img src="images/emoji.png">
				<img src="images/emoji.png">
			</p>

			<div class="grass"></div>

			<script type="text/javascript">
				var numberOfBlades = 700;
				var grass = document.getElementsByClassName('grass')[0];

				function assignRandomStyles(blade) {
  					var randomHeight =  Math.floor(Math.random() * 50);
  					var randomLeft = Math.floor(Math.random() * (window.innerWidth - 8));
  					var randomRotation = Math.floor(Math.random() * 10) - 5;
  					blade.style.height = (randomHeight) + 'px';
  					blade.style.zIndex = randomHeight;
  					blade.style.opacity = randomHeight * 0.02;
  					blade.style.left = randomLeft + 'px';
  					blade.style.transform = 'rotate(' + randomRotation + 'deg)';
				}

				for (var i = 0; i < numberOfBlades; i++) {
				  	var blade = document.createElement('div');
				  	assignRandomStyles(blade);
				  	grass.appendChild(blade);
				}
			</script>

		</div>

		<nav class="navbar navbar-default">
  			<div class="container-fluid">

    			<ul class="nav navbar-nav">

      				<?php

      					foreach ($nav_sections as $section) {
      						print_nav($section[0], $section[1]);
      					}

      				?>

    			</ul>

    			<!-- Session-related stuff -->
    			<?php
    				session_start();

					if (isset($_POST['submit_login'])) {
						$username = htmlspecialchars($_POST['username']);
						$password = htmlspecialchars($_POST['password']);

						foreach ($users as $user) {
							if (($username == $user['username']) && 
								($password == $user['password'])) {
									$_SESSION['user'] = $username;
							}
						}
					}

	    			if(!isset($_SESSION['user'])) {
	    				// session isn't started

	    				// Register Button
	    				echo "<div class='navbar-form navbar-right'>
								<button type='button' class='btn btn-success' name='register' data-toggle='modal' data-target='#registerModal'>Register</button>
								</div>";

						// Registration Modal
						echo '<div id="registerModal" class="modal fade" role="dialog">
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
		      										<input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
		    									</div>
		  									</div>

							      			<div class="form-group">
		    									<label class="control-label col-md-4" for="password">Password:</label>
		    									<div class="col-md-6">
		      										<input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
		    									</div>
		  									</div>

		  									<div class="form-group">
		    									<label class="control-label col-md-4" for="confirm_password">Confirm password:</label>
		    									<div class="col-md-6">
		      										<input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm password">
		    									</div>
		    									<div class="col-md-2" id="confirm_password_warning"></div>
		  									</div> 									
		  									<div class="form-group"> 
		    									<div class="col-md-12">
		      										<input type="submit" class="btn btn-primary disabled" id="register_button" name="register_user" value="Submit">
		    									</div>
		  									</div>

							      		</form>

							      	</div>

							      	<div class="modal-footer">
							        	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
							      	</div>

							    </div></div></div>';

						// Login Form
						echo '<form method="POST" class="navbar-form navbar-right" action="members.php">
			      				<div class="form-group">
			        				<input type="text" class="form-control" name="username" placeholder="Username">
			        				<input type="password" class="form-control" name="password" placeholder="Password">
			      				</div>
			      				<input type="submit" class="btn btn-primary" name="submit_login" value="Login">
			    				</form>';						
					} else {
						echo '<form method="POST" class="navbar-form navbar-right" action="logout.php">
								<p class="navbar-text">Hi ';
						echo $_SESSION['user'];
						echo '</p>
								<input type="submit" class="btn btn-warning" name="logout" value="Logout">
								</form>';
					}

    			?>

    			<script type="text/javascript">

    				$("#password, #confirm_password").change(function(){
    					checkPassword()
					});

					$("#username").change(function(){
	    				if ($('#username').val() == "") $('#register_button').addClass("disabled")
	    				else $('#register_button').removeClass("disabled")
					});

    				function checkPassword() {
	    				if ($('#password').val() != $('#confirm_password').val()) {
	    					$('#confirm_password_warning').text("Must match password")
	    					$('#confirm_password_warning').css("color", "red")
	    					$('#register_button').addClass("disabled")
	    				} else {
	    					$('#confirm_password_warning').text("")
	    					$('#register_button').removeClass("disabled")
	    				}
    				}

    			</script>

  			</div>
		</nav>

		<div class="container">