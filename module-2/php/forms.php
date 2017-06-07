<!DOCTYPE html>
<html>

	<head>
		<title>PHP Forms</title>
	</head>

	<body>

		<?php 

			if (isset($_POST['username'])) {
				echo "Hi ".$_POST['username'];
			}
			
		?>

		<form method="post" action="">

			username: <input type="text" name="username">
			<br>
			password: <input type="password" name="password">
			<br>
			<button>Submit</button>

		</form>

	</body>

</html>