<?php

	session_start();

	session_destroy();

	echo "You've been logged out.<br>";
	echo "Bye " . $_SESSION['user']; 

?>