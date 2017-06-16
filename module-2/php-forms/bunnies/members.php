<?php 

	$active_page = "Members Section";
	require_once "bunny-template.php"; 

?>

<h1>Members Only</h1>

<?php

	if(!isset($_SESSION['user'])) {
		echo "<p>Members, please log in above.</p>";
		echo "<p>Otherwise, you may have entered the wrong login credentials. Please try again.</p>";
	} else {
		echo "Welcome ";
		echo $_SESSION['user'];
		echo ". Nothing here yet :p";
	}

?>

<?php require_once "footer.php"; ?>