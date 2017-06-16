<?php 

	$active_page = "Bunny";
	require_once "bunny-template.php"; 

?>

<?php

	$current_bunny = $_GET['id'];

	print_single_bunny($bunnies[$current_bunny]);

?>

<?php require_once "footer.php"; ?>