<?php 

	$active_page = "Breeds";
	require_once "bunny-template.php"; 

?>

<form method="POST">
	<select name="category">
		<option value="all">All</option>

		<?php
		
			$categories = array_unique(array_column($bunnies, 'category'));

			foreach ($categories as $category) {
				if (isset($_POST['category']) && $_POST['category'] == $category) {
					print_category($category, true);
				} else {
					print_category($category, false);
				}
			}

		?>

	</select>
	<input type="submit" name="submit_category" value="Filter">
</form>

<?php

	print_all_bunnies($bunnies);

?>

<?php require_once "footer.php"; ?>