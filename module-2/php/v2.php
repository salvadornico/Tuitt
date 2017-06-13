<?php
	require_once "partial.php";
?>

<!DOCTYPE html>
<html>

	<head>

		<title>?</title>

		<link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Playfair+Display" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="xmas.css">
		<script src="https://use.fontawesome.com/8a3d0f859b.js" rel="stylesheet" media="all"></script>

	</head>

	<body>

		<form method="POST">
			
			<input type="submit" name="nextDay" value="Next">

			<input type="hidden" name="counter" value="<?php echo $counter; ?>">

		</form>

		<p>
			<?php printSong(); ?>
		</p>

	</body>

</html>