<!DOCTYPE html>
<html>

	<head>
		<title>PHP Arrays</title>
	</head>

	<body>

		<?php 

			// standard indexed array
			$colors = ['red', 'orange', 'yellow'];
			echo $colors[1];

			echo "<ul>";
			foreach ($colors as $color) {
				echo "<li>".$color."</li>";
			}
			echo "</ul>";

			echo "<hr>";

			// associative array (with key-value pairs)
			$days = array(
				'January' => 31,
				'February' => 28,
				'April' => 30
			);
			echo $days['January']."<br><br>";

			foreach ($days as $key => $value) {
				echo "key: ".$key.", value: ".$value."<br>";
			}

			echo "<hr>";

			// multidimensional array
			$records = [
				'Billy' => ['username' => 'billy', 'password' => 'b1lLy'],
				'Peejay' => ['username' => 'peejay', 'password' => 'p33j4y']
			];
			echo $records['Peejay']['username']."<br>";
			echo $records['Peejay']['password']."<br><br>";
			
			foreach ($records as $name => $record) {
				echo $name.":<br>";
				foreach ($record as $key => $value) {
					echo $key.": ".$value."<br>";
				}
			}			
			
		?>

	</body>

</html>