<?php

	if (isset($_POST['counter'])) {
		$counter = $_POST['counter'] + 1;
	} else {
		$counter = 0;
	}

	$days = [
		1 => 'first',
		2 => 'second',
		3 => 'third',
		4 => 'fourth',
		5 => 'fifth',
		6 => 'sixth',
		7 => 'seventh',
		8 => 'eighth',
		9 => 'ninth',
		10 => 'tenth',
		11 => 'eleventh',
		12 => 'twelfth',
	];	

	$gifts = [
		1 => 'a partridge in a pear tree',
		2 => 'Two turtle doves',
		3 => 'Three French hens',
		4 => 'Four calling birds',
		5 => 'Five golden rings',
		6 => 'Six geese-a-laying',
		7 => 'Seven swans-a-swimming',
		8 => 'Eight maids-a-milking',
		9 => 'Nine ladies dancing',
		10 => 'Ten lords-a-leaping',
		11 => 'Eleven pipers piping',
		12 => 'Twelve drummers drumming'
	];

	function printSong() {
		foreach ($days as $key => $value) {
			if ($key == $_POST['counter']) {
				echo "On the " . $value . " day of Christmas my true love gave to me<br>";
			}
		}

		foreach ($gifts as $key => $value) {
			if ($key == $_POST['counter']) {
				for ($j = $i; $j >= 0; $j--) { 
					if ($i == 0) {
						echo ucfirst($days_of_christmas[0][1]) . "<br><br>";
					} else if ($j == 0) {
						echo "And " . $days_of_christmas[$j][1] . "<br><br>";
					} else {
						echo $days_of_christmas[$j][1] . "<br>";
					}
				}
			}
		}
	};

	

?>