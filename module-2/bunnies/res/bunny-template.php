<?php 

	session_start();

	require_once "res/bunny_lib.php";

?>

<!DOCTYPE html>
<html>

	<head>

		<title>
			Bunnies - <?php echo $active_page; ?>
		</title>

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans|Pangolin" rel="stylesheet">

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Custom CSS -->
		<link rel="stylesheet" type="text/css" href="res/bunnies.css">

		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<!-- Bootstrap JS -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<!-- Custom JS -->
		<script type="text/javascript" src="res/scripts.js" defer></script>

	</head>

	<body>

		<?php require_once "res/header.php"; ?>

		<div class="container">