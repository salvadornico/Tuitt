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

		<hr>

		<?php

			$string = "el rapid guineu marro salta sobre el gos mandros.";
			echo strtoupper($string)."<br>";
			echo strtolower($string)."<br>";
			echo ucfirst($string)."<br>";
			echo ucwords($string)."<br>";

			echo strpos($string, 'guineu')."<br>"; //returns index of first instance of first character of 'guineu'
			echo strrev($string)."<br>";

			echo "<br>";

			echo substr($string, strpos($string, 'marro'))."<br>";

			echo "<br>";

			// Inserts 'quick' in front of first instance of 'brown'
			$string_nou = "Benny the bouncing brown fox salesman.";
			echo $string_nou."<br>";
			$pos_b = strrpos($string_nou, 'brown');
			echo substr($string_nou, 0, $pos_b)."quick ".substr($string_nou, $pos_b);

		?>

		<hr>

		<?php

			// Palindrome tester
			$word = "Racecar";

			if (strtolower($word) == strtolower(strrev($word))) {
				echo $word." is a palindrome!";
			} else {
				echo $word." is not a palindrome.";
			};

		?>

		<hr>

		<?php

			// Pythagorean Theorem
			$a = 4;
			$b = 3;

			echo sqrt(pow($a, 2) + pow($b, 2));

			echo "<br><br>";

			echo "A = ".$a."<br>";
			echo "B = ".$b."<br>";
			echo "A + B = ".($a + $b)."<br>";
			echo "A - B = ".($a - $b)."<br>";
			echo "A x B = ".($a * $b)."<br>";
			echo "A ÷ B = ".round(($a / $b),2)."<br>";
			echo "A % B = ".($a % $b)."<br>";
			echo "++B = ".(++$b)."<br>";
			echo "--A = ".(--$a)."<br>";

			$letter = 'a';
			echo ++$letter;
			echo "<br>";
			$letter = 'z';
			echo ++$letter;

			echo "<br>";

			$a = 4;
			$b = 3;

			$temp = $a;
			$a = $b;
			$b = $temp;

			echo "A = ".$a."<br>";
			echo "B = ".$b."<br>";

		?>

		<hr>

		<?php

			$grades = array(93, 90, 88, 95, 100, 90);
			echo "Average is ".round((array_sum($grades) / count($grades)),2);

		?>

		<hr>

		<?php
			
			$num = 37;

			if ($num % 2 == 0) {
				echo "Even";
			} else {
				echo "Odd";
			};

		?>

		<hr>

		<?php

			$num = 11;

			if ($num % 6 == 0) {
				echo "Even multiple of 3";
			} elseif ($num % 3 == 0) {
				echo "Odd multiple of 3";
			} else {
				echo "Not a multiple of 3";
			};

		?>

		<hr>

		<?php

			// Days of the week
			$input = 21;

			switch ($input) {
				case 1:
					echo "Monday";
					break;
				case 2:
					echo "Tuesday";
					break;
				case 3:
					echo "Wednesday";
					break;
				case 4:
					echo "Thursday";
					break;
				case 5:
					echo "Friday";
					break;
				case 6:
					echo "Saturday";
					break;
				case 7:
					echo "Sunday";
					break;
				default:
					echo "Not a number between 1 and 7";
					break;
			}

			echo "<br>";

			// Handles overflow beyond 7 by looping around
			$days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

			echo $days[$input%7];

		?>

	</body>

</html>