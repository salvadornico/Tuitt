<!DOCTYPE html>
<html>

	<head>

		<title>PHP - Exercise 2</title>

		<style>

			table, th, td {
				border: 1px solid black;
				border-collapse: collapse;
				text-align: center; 
				padding: 10px 20px;
			}

		</style>

	</head>

	<body>

		<?php
			
			$names1 = array("Jon", "Alex", "Jeff", "Brandon", "Victor", "Itchy", "Cosi", "Franco", "Chi-chan", "Jon", "Alex", "Jeff", "Brandon", "Victor", "Itchy", "Cosi", "Franco", "Chi-chan", "Jon", "Alex", "Jeff", "Brandon", "Victor", "Itchy", "Cosi", "Franco", "Chi-chan", "Jon", "Alex", "Jeff", "Brandon", "Victor", "Itchy", "Cosi", "Franco", "Chi-chan");
			$names2 = array("Jim", "Spock", "Bones", "Sulu", "Scotty", "Uhura", "Old Spock", "Jim", "Spock", "Bones", "Sulu", "Scotty", "Uhura", "Old Spock");

			// List 1
			echo "<ul>";
			for ($i = 0; $i < sizeof($names1); $i++) {
				echo "<li>".$names1[$i]."</li>";
			};
			echo "</ul>";

			// List 2
			echo "<ul>";
			for ($i = 0; $i < sizeof($names2); $i++) {
				echo "<li>".$names2[$i]."</li>";
			};
			echo "</ul>";

			echo "<hr>";

			// Table
			echo "<table>
					<tr>
						<th>Names 1</th>
						<th>Names 2</th>
					</tr>";
			for ($i = 0; $i < min(sizeof($names1),sizeof($names2)); $i++) {
				echo "<tr>";
				echo "<td>".$names1[$i]."</td>";
				echo "<td>".$names2[$i]."</td>";
				echo "</tr>";
			};
			echo "</table>";

		?>

	</body>

</html>