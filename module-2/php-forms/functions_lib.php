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
		$date_for_check = intval(strval($mm) . strval($dd));

		$zodiac = [
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
			['Sagittarius', 1122, 1221],
			['Capricorn', 1222, 119]
		];

		if (($date_for_check >= $zodiac[11][1]) || ($date_for_check <= $zodiac[11][2])) {
			return $zodiac[11][0];
		} else {
			for ($i = 0; $i < (count($zodiac) - 1); $i++) { 
				if (($zodiac[$i][1] <= $date_for_check) && ($zodiac[$i][2] >= $date_for_check)) {
					return $zodiac[$i][0];
				}
			}			
		}

	}

	function get_chinese_sign($date_arr) {
		$yyyy = $date_arr[0];

		$chinese_zodiac = [
			['Monkey', '猴'],
			['Rooster', '雞'],
			['Dog', '狗'],
			['Pig', '豬'],
			['Rat', '鼠'],
			['Ox', '牛'],
			['Tiger', '虎'],
			['Rabbit', '兔'],
			['Dragon', '龍'],
			['Snake', '蛇'],
			['Horse', '馬'],
			['Goat', '羊']
		];

		$chinese_elements = [
			['Metal', '金'],
			['Metal', '金'],
			['Water', '水'],
			['Water', '水'],
			['Wood', '木'],
			['Wood', '木'],
			['Fire', '火'],
			['Fire', '火'],
			['Earth', '土'],
			['Earth', '土']
		];

		for ($i = 0; $i < count($chinese_elements); $i++) { 
			if (($yyyy % 10) == $i) {
				$element_en = $chinese_elements[$i][0];
				$element_cn = $chinese_elements[$i][1];
			}
		}

		for ($i = 0; $i < count($chinese_zodiac); $i++) { 
			if (($yyyy % 12) == $i) {
				$animal_en = $chinese_zodiac[$i][0];
				$animal_cn = $chinese_zodiac[$i][1];
			}
		}

		return $element_en . " " . $animal_en . " " . $element_cn . $animal_cn;
	}

	function create_form($name, $answers, $submit_message) {
		echo "<form method='POST'><select name='";
		echo $name;
		echo "'><option selected='selected'>Choose one</option>";

		for ($i = 0; $i < count($answers); $i++) { 
			echo "<option value='";
			echo $answers[$i][0];
			echo "'>";
			echo $answers[$i][1];
			echo "</option>";
		}

		echo "</select>
				<input type='submit' name='submit_";
		echo $name;
		echo "' value='";
		echo $submit_message;
		echo "'></form>";
	}

?>