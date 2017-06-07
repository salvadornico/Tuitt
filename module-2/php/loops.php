<!DOCTYPE html>
<html>

	<head>
		<title>PHP Loops</title>
	</head>

	<style>
		td {
			padding: 5px;
			text-align: center;
		}
	</style>

	<body>

		<?php 

			$count = 1;
			while ($count <= 12) {
				echo "$count times 12 is ".($count * 12)."<br>";
				++$count;
			}
			var_dump($count);

			echo "<br><br>";

			$count = 15;
			do {
				echo "$count times 12 is ".($count * 12)."<br>";
				++$count;
			} while ($count <= 12);
			var_dump($count);

			echo "<br><br>";

			$days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

			for ($i = 1; $i < 29; $i++) { 
				echo $i.") ".$days[$i%7]."<br>";
			}

			echo "<br>";

			for ($i = 1; $i < 13; $i++) { 
				echo $i." squared is ".($i*$i)."<br>";
			}

			echo "<br>";

			for ($i = 1; $i < 51; $i++) { 
				if ($i < 16) {
					echo $i.") ".($i * 2)."<br>";
				} elseif ($i < 36) {
					echo $i.") ".((30 - $i) / 2)."<br>";
				} else {
					echo $i.") ".($i + 6)."<br>";
				}
			}

			echo "<br>";			

			function factorial($input) {
				$factorial = 1;
				for ($i=$input; $i > 0; $i--) { 
					$factorial *= $i;
				}
				return $factorial;	
			}

			for ($i = 1; $i < 16; $i++) { 
				echo $i."! is ".factorial($i)."<br>";
			}

			echo "<br>";

			$sum_even = 0;
			$sum_odd = 0;
			for ($i = 1; $i < 51; $i++) { 
				if ($i % 2 == 0) {
					$sum_even += $i;
				} else {
					$sum_odd += $i;
				}
			}

			echo "Sum of even numbers is $sum_even.<br>Sum of odd numbers is $sum_odd.";

			echo "<br><br>";

			$string = "The quick brown fox jumped over the lazy dog.";

			
			for ($i = 0; $i < strlen($string); $i++) { 
				if (ctype_alpha($string[$i])) {
					echo substr($string, 0, $i+1)."<br>";
				}		
			}

			for ($i = 0; $i < strlen($string); $i++) { 
				if (ctype_alpha($string[$i])) {
					echo substr($string, $i, (strlen($string)-$i))."<br>";
				}		
			}

			echo "<br>";

			// J3j3-fy
			for ($i = 0; $i < strlen($string); $i++) { 
				switch ($string[$i]) {
					case 'e':
						$string[$i] = '3';
						break;
					case 'o':
						$string[$i] = '0';
						break;
					case 'i':
						$string[$i] = '1';
						break;
					case 'a':
						$string[$i] = '4';
						break;	
					default:
						break;
				}				

				if ($i % 2 == 0) {
					$string[$i] = strtolower($string[$i]);
				} else {
					$string[$i] = strtoupper($string[$i]);
				}
			}
			echo $string;

			echo "<br><br>";

			$string = "The quick brown fox.";
			$vowels = array('a','e','i','o','u');
			$vowel_count = 0;
			$consonant_count = 0;

			for ($i = 0; $i < strlen($string); $i++) { 
				if (ctype_alpha($string[$i])) {
					if (in_array(strtolower($string[$i]), $vowels)) {
						$vowel_count++;
					} else {
						$consonant_count++;
					}
				}
			}

			echo "Number of vowels: $vowel_count"."<br>";
			echo "Number of constants: $consonant_count"."<br>";

			echo "<br><br>";

			echo "<table>";
			for ($i = 1; $i < 16; $i++) { 
				echo "<tr>";
				for ($j = 1; $j < 16; $j++) { 
					if (($i+$j)%2 == 0) {
						echo "<td>";
					} else {
						echo "<td style='background: maroon; color: white'>";
					}
					echo ($j*$i)."</td>";
				}
				echo "</tr>";
			}
			echo "</table>";

			echo "<br><br>";

			// Fibonacci
			$prev = 0;
			$current = 1;			
			for ($i = 0; $i < 8; $i++) {
				echo $current."-";
				$prev += $current;
				echo $prev."-";
				$current += $prev;
			}

			echo "<br>";

			$prev = 0;
			$current = 1;
			for ($i = 0; $i < 16; $i++) {
				echo $current."-";
				$next = $prev + $current;
				$prev = $current;
				$current = $next;
			}
			
		?>

	</body>

</html>