<?php

	$nav_sections = [
		["Home", "index.php"],
		["Breeds", "bunnies.php"],
		["Members Section", "members.php"]
	];

	function print_nav($title, $target) {
		echo "<li";

		// if active page, applies appropriate Bootstrap class
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
	$bunny_string = file_get_contents('res/bunnies.json');
	if ($bunny_string) $bunnies = json_decode($bunny_string, true);

	function print_all_bunnies($bunnies) {
		// Sets up rows for arrangement of cards
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
					echo "</a></div>";

					// Alternates every other entry to close row with two cards each
					$counter++;
					if ($counter % 2 == 0) {
						echo "</div><div class='row'>";
					}
			}
		}
		echo "</div>";
	}

	function print_single_bunny($bunny) {
		echo "<div class='bunny-box clearfix'><img src='images/";
		echo $bunny['img'];
		echo "' class='img-responsive'><div><h4>";
		echo $bunny['name'];
		echo "</h4><p>";
		echo $bunny['description'];
		echo "</p><span>";
		echo $bunny['weight'];
		echo "</span></div></div>";
	}

	// Add new bunny
	if (isset($_POST['add_bunny'])) {
		$new_bunny = [];

		$new_bunny['name'] = $_POST['name'];
		$new_bunny['weight'] = $_POST['weight'];
		$new_bunny['description'] = $_POST['description'];
		$new_bunny['category'] = $_POST['category'];
		$new_bunny['img'] = $_POST['img'];

		$bunnies[] = $new_bunny;

		$fp = fopen('res/bunnies.json', 'w');
		fwrite($fp, json_encode($bunnies, JSON_PRETTY_PRINT));
		fclose($fp);
	}

	// Edit bunny functionality is in single_bunny.php, due to dependency on GET variables


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
	$user_string = file_get_contents('res/users.json');
	if ($user_string) $users = json_decode($user_string, true);

	// Login processing
	if (isset($_POST['submit_login'])) {
		$username = htmlspecialchars($_POST['username']);
		$password = htmlspecialchars($_POST['password']);

		foreach ($users as $user) {
			if (($username == $user['username']) && 
				($password == $user['password'])) {
					$_SESSION['user'] = $username;
			}
		}
	}

	// Register new user
	if (isset($_POST['register_user'])) {
		//TODO: Regex validation of password
		if (($_POST['password'] != "") && ($_POST['password'] == $_POST['confirm_password'])) {

			$new_user = [];

			$new_user['username'] = $_POST['username'];
			$new_user['password'] = $_POST['password'];

			$users[] = $new_user;

			$fp = fopen('res/users.json', 'w');
			fwrite($fp, json_encode($users, JSON_PRETTY_PRINT));
			fclose($fp);
		}
	}

	// Edit user
	if (isset($_POST['edit_user'])) {
		$username = $_POST['username'];
		$old_password = $_POST['old_password'];
		$new_password = $_POST['new_password'];
		$confirm_password = $_POST['confirm_password'];
		$index;

		// Cycle through records looking for correct account, plus validation of new password
		foreach ($users as $key => $value) {
			if (($value['username'] == $username) && 
				($value['password'] == $old_password) && 
				($new_password == $confirm_password)) {
				
				//record index of correct account
				$index = $key;
			}
		}

		// set new value
		$users[$index]['password'] = $new_password;

		$fp = fopen('res/users.json', 'w');
		fwrite($fp, json_encode($users, JSON_PRETTY_PRINT));
		fclose($fp);
	}
?>