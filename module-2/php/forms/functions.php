<?php
	require_once "functions_lib.php";
?>

<!DOCTYPE html>
<html>

	<head>
		<title>Functions & External Classes</title>
	</head>

	<body>

		<form method="POST">
			<input type="number" name="length" placeholder="Length">
			<input type="number" name="width" placeholder="Width">
			<input type="submit" name="submit_area" value="Get Area">
		</form>

		<br>

		<?php

			if (isset($_POST['submit_area'])) {
				$length = htmlspecialchars($_POST['length']);
				$width = htmlspecialchars($_POST['width']);
				echo "The area is " . get_area($length, $width);
			}

		?>

		<hr>

		<h1>F.L.A.M.E.S.</h1>

		<form method="POST">
			<input type="text" name="name1" placeholder="Name 1">
			<input type="text" name="name2" placeholder="Name 2">
			<input type="submit" name="submit_flames" value="&#x2764;">
		</form>

		<?php

			if (isset($_POST['submit_flames'])) {
				$name1 = htmlspecialchars($_POST['name1']);
				$name2 = htmlspecialchars($_POST['name2']);
				flames($name1, $name2);
			}

		?>

		<hr>

		<h1>Zodiac</h1>

		<form method="POST">
			<input type="date" name="date" placeholder="Enter your birthday">
			<input type="submit" name="submit_zodiac" value="What's your sign?">
		</form>

		<?php

			if (isset($_POST['submit_zodiac'])) {
				$date = $_POST['date'];
				$date_arr = explode('-', $date);
				echo print_date($date_arr);
				echo " is under ";
				echo get_sign($date_arr);

			}

		?>

	</body>

</html>