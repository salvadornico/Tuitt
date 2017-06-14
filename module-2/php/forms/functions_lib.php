<?php

	function get_area($length, $width) {
		return $length * $width;
	}

	function flames($name1, $name2) {
		if (empty($name1) || empty($name2)) {
			echo "Please type two names..";
			return;
		}

		$counter = 0;
		$name1_array = str_split(strtolower($name1));
		$name2_array = str_split(strtolower($name2));

		for ($i = 0; $i < count($name1_array); $i++) { 
			// if alphabetic chars only
			if (ctype_alpha($name1_array[$i])) {
				// if letter in name1 doesnt have a match
				if (!in_array($name1_array[$i], $name2_array)) {
					++$counter;				
				}
			}
		}

		// repeat for name2
		for ($i = 0; $i < count($name2_array); $i++) {
			if (ctype_alpha($name2_array[$i])) {
				if (!in_array($name2_array[$i], $name1_array)) {
					++$counter;				
				}
			}
		}

		$simple_count = $counter % 6;
		$name1 = ucfirst($name1);
		$name2 = ucfirst($name2);

		if ($name1_array === $name2_array) {
			echo "$name1 and $name2's hearts are one &#x2764;";
			return;
		}

		switch ($simple_count) {
			case 1:
				echo "$name1 and $name2 will be friends.";
				break;
			case 2:
				echo "$name1 and $name2 will be lovers.";
				break;
			case 3:
				echo "$name1 and $name2 will be angry at each other.";
				break;
			case 4:
				echo "$name1 and $name2 will be married.";
				break;
			case 5:
				echo "$name1 and $name2 will be enemies.";
				break;		
			default:
				echo "$name1 and $name2 will be soulmates.";
				break;
		}
	}

	function print_date($date_arr) {				
		$yyyy = $date_arr[0];
		$mm = $date_arr[1]/1;
		$dd = $date_arr[2]/1;

		$months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

		return $months[$mm - 1] . " " . $dd . ", " . $yyyy;
	}

	function get_sign($date_arr) {
		$mm = $date_arr[1]/1;
		$dd = $date_arr[2];
		$date_for_check = strval($mm) . strval($dd);

		$zodiac = [
			['Capricorn', 1222, 119],
			['Aquarius', 120, 218],
			['Pisces', 219, 320],
			['Aries', 321, 419],
			['Taurus', 420, 520],
			['Gemini', 521, 620],
			['Cancer', 621, 722],
			['Leo', 723, 822],
			['Virgo', 823, 922],
			['Libra', 923, 1022],
			['Scorpio', 1023, 1121],
			['Sagittarius', 1122, 1221]
		];

		for ($i = 0; $i < count($zodiac); $i++) { 
			if (($zodiac[$i][1] <= $date_for_check) && ($zodiac[$i][2] >= $date_for_check)) {
				return $zodiac[$i][0];
			// TODO: Account for Capricorn
			// } else {
			// 	return $zodiac[0][0];
			}
		}
	}

?>