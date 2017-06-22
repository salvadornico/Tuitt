<?php

	// Open SQL connection
	$host = 'localhost';
	$sql_username = 'root';
	$sql_password = '';
	$database = 'bunnies';
	$conn = mysqli_connect($host, $sql_username, $sql_password, $database);

	// Set up query
	function query_sql($query) {
		global $conn;
		$result = mysqli_query($conn, $query);
		return $result;
	}


	// Print navbar sections
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


	// Bunny category filter
	function print_categories() {
		$result = query_sql("SELECT DISTINCT category FROM bunnydetails");

		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				extract($row);

				echo "<option ";
				if (isset($_POST['category']) && ($_POST['category'] == $category)) { 
						echo "selected ";
					}
				echo "value='";
				echo $category;
				echo "'>";
				echo $category;
				echo "</option>";
			}
		}
	}


	// Displaying bunnies
	function print_all_bunnies() {
		// sets up rows for arrangement of cards
		$counter = 0;
		echo "<div class='row'>";

		$result = query_sql("SELECT * FROM bunnydetails");
		// printing
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				extract($row);

				if (!isset($_POST['submit_category']) || 
					($_POST['category'] == 'all') || 
					($_POST['category'] == $category)) {
						// printing
						echo "<div class='col-md-6'>";
						echo "<a href='single_bunny.php?id=$id'>";
						echo "<div class='bunny-box clearfix'><img src='images/$img' class='img-responsive'>";
						echo "<div><h4>$name</h4>";
						echo "<p>$description</p>";
						echo "<span>$weight</span></div></div></a></div>";

						// Alternates every other entry to close row with two cards each
						$counter++;
						if ($counter % 2 == 0) {
							echo "</div><div class='row'>";
						}
				}			
			}
			echo "</div>";
		}
	}

	function print_single_bunny($id) {
		$result = query_sql("SELECT * FROM bunnydetails
				WHERE id = $id");
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				extract($row);

				echo "<div class='bunny-box clearfix'><img src='images/$img' class='img-responsive'>";
				echo "<div><h4>$name</h4>";
				echo "<p>$description</p>";
				echo "<span>$weight</span></div></div>";

				global $current_name;
				$current_name = $name;
				global $current_weight;
				$current_weight = $weight;
				global $current_description;
				$current_description = $description;
				global $current_category;
				$current_category = $category;
			}
		}
	}

	// Add new bunny
	if (isset($_POST['add_bunny'])) {
		$name = $_POST['name'];
		$weight = $_POST['weight'];
		$description = $_POST['description'];
		$category = $_POST['category'];
		$img = $_POST['img'];

		$sql = "INSERT INTO bunnydetails (name, weight, description, category, img)
					VALUES ('$name', '$weight', '$description', '$category', '$img')";

		mysqli_query($conn, $sql);
	}

	// Edit bunny functionality is in single-bunny.php due to GET variable dependencies


	// Login processing
	if (isset($_POST['submit_login'])) {
		$username = $_POST['username'];
		$password = sha1($_POST['password']);

		$result = query_sql("SELECT * FROM users WHERE username = '$username'
				and password = '$password'");
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				extract($row);
				$_SESSION['user'] = $username;
				$_SESSION['role'] = $role;				
			}
		}
	}

	// Register new user
	if (isset($_POST['register_user'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$confirm_password = $_POST['confirm_password'];

		if ($password == $confirm_password && $username != '') {
			$password = sha1($password);

			$sql = "INSERT INTO users (username, password, role)
					VALUES ('$username', '$password', 'regular')";

			mysqli_query($conn, $sql);

			echo "Registration successful!";
		} else {
			echo "Registration failed. Please try again.";
		}
	}

	// Edit user
	if (isset($_POST['edit_user'])) {
		$username = $_POST['username'];
		$old_password = $_POST['old_password'];
		$new_password = $_POST['new_password'];
		$confirm_password = $_POST['confirm_password'];
		
		if ($new_password == $confirm_password && $username != '') {
			$new_password = sha1($new_password);

			$sql = "UPDATE users SET password = '$new_password' WHERE username = '$username'";

			mysqli_query($conn, $sql);

			echo "Password change successful!";
		}
	}
?>