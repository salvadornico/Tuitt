<?php 

	require_once "connection.php";


	$sql = "select firstName, lastName from employees";

	$result = mysqli_query($conn, $sql); // returns type Object

	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) { 
			// mysqli_fetch_assoc only fetches one entry at a time, so we need to loop through all entries
			echo $row['firstName'] . ' ' . $row['lastName'] . "<br>";
		}
	}

	
	echo "<hr>";


	$sql = "select * from employees";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			// alternate method to extract data from array
			extract($row);
			echo $firstName . ' ' . $lastName . "<br>";
		}
	}

	
	echo "<hr>";


	$sql = "select * from employees";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		echo "<ul>";
		while ($row = mysqli_fetch_assoc($result)) { 
			extract($row);
			echo "<li>" . $firstName . ' ' . $lastName . "</li><br>";
		}
	}

?>