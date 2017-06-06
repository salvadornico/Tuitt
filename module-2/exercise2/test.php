<!DOCTYPE html>
<html>

	<head>
		<title>PHP test</title>
	</head>

	<body>

		<?php 

			$name = 'Bob';
			echo "Hello $name";
			echo "<br>";
			echo 'Hello $name';

		?>

		<hr>

		<?php

			define("ROOT", "localhost/Nico/");
			echo ROOT;

			echo "<br>";

			$array = array("spam", "eggs", "bacon");
			echo $array[1];

		?>

		<hr>

		<?php

			$x = "Hello ";
			$y = "World";
			echo $x . $y;

			echo "<br>";

			$x .= $y;
			echo $x;

		?>

		<hr>

		<?php

			$a = "1000";
			$b = "+1000";
			if ($a == $b) {echo "1 <br>";} else {echo "No";};
			if ($a === $b) {echo "2 <br>";} else {echo "No";};

		?>

	</body>

</html>