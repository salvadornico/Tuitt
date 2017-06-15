<!DOCTYPE html>
<html>

	<head>
		<title></title>
	</head>

	<body>

		<?php
	
			session_start();

			$username = htmlspecialchars($_POST['username']);
			$password = htmlspecialchars($_POST['password']);

			if (authenticate($username, $password)) {
				echo "User is valid.<br>"; 
				$_SESSION['user'] = $username;
				echo "Hi " . $_SESSION['user'];
				echo '<form method="POST" action="logout.php">
						<button>Logout</button>			
					</form>';
			} else {
				echo "Incorect login";
			}

			function authenticate($username, $password) {
				if ($username == 'admin' && $password == 'secret') {
					return true;
				} else {
					return false;
				}
			}

		?>

		

	</body>

</html>

