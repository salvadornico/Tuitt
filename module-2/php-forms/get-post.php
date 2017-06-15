<!DOCTYPE html>
<html>

	<head>
		<title></title>
	</head>

	<body>

		<?php
	
			echo htmlspecialchars($_POST['input']);
			echo "<br>";
			echo "Hello ";
			echo htmlspecialchars($_POST['name']);

		?>

	</body>

</html>

