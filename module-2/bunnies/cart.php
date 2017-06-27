<?php

	session_start();
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}

	if (isset($_SESSION['cart_item'][$id])) {
		$_SESSION['cart_item'][$id]++;
	} else {
		$_SESSION['cart_item'][$id] = 1;
	}

	foreach ($_SESSION['cart_item'] as $id => $qty) {
		echo "Item: $id, Qty: $qty <br>";
	}

?>