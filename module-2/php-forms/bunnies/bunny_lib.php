<?php

	$nav_sections = [
		["Home", "index.php"],
		["Breeds", "bunnies.php"],
		["Members Section", "members.php"]
	];

	function print_nav($title, $target) {
		echo "<li";

		// if active
		global $active_page;
		if ($active_page == $title) {
			echo " class='active'";
		}

		echo "><a href='";
		echo $target;
		echo "''>";
		echo $title;
		echo "</a></li>";
	}

	// Initializing bunnies list
	$string = file_get_contents('bunnies.json');
	$bunnies = json_decode($string, true);

	function print_all_bunnies($bunnies) {

		$counter = 0;
		echo "<div class='row'>";
		foreach ($bunnies as $bunny) {
			if (!isset($_POST['submit_category']) || 
				($_POST['category'] == 'all') || 
				($_POST['category'] == $bunny['category'])) {
					$id = array_keys($bunnies, $bunny);

					echo "<div class='col-md-6'>";

					// Insert link & ID for single bunny pages
					echo "<a href='single_bunny.php?id=";
					echo $id[0];
					echo "'>";
					print_single_bunny($bunny);
					echo "</a>";

					$counter++;
					if ($counter % 2 == 0) {
						echo "</div><div class='row'>";
					}
			}
		}
		echo "</div>";
	}

	function print_single_bunny($bunny) {
		echo "<div class='bunny-box'><img src='images/";
		echo $bunny['img'];
		echo "' class='img-responsive'><div><h4>";
		echo $bunny['name'];
		echo "</h4><p>";
		echo $bunny['description'];
		echo "</p><span>";
		echo $bunny['weight'];
		echo "</span></div></div></div></a>";
	}

	function print_category($category, $is_selected) {
		echo "<option ";
		if ($is_selected == true) { echo "selected "; }
		echo "value='";
		echo $category;
		echo "'>";
		echo $category;
		echo "</option>";
	}

	// Initializing registered user list
	$string = file_get_contents('users.json');
	$users = json_decode($string, true);

	// Register new user
	if (isset($_POST['register_user'])) {
		if ($_POST['password'] == $_POST['confirm_password']) {
			$new_user = [];

			$new_user['username'] = $_POST['username'];
			$new_user['password'] = $_POST['password'];

			$users[] = $new_user;

			$fp = fopen('users.json', 'w');
			fwrite($fp, json_encode($users, JSON_PRETTY_PRINT));
			fclose($fp);
		}
	}

	// function is_empty_submission($arr) {
	// 	foreach ($arr as $value) {
	// 		if ($value == 0) return false;
	// 		else return true;
	// 	}
	// }

?>