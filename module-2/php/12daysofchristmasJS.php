<!DOCTYPE html>
<html>

	<head>

		<title>PHP/JS 12 Days of Christmas</title>

		<link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Playfair+Display" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="xmas.css">
		<script src="https://use.fontawesome.com/8a3d0f859b.js" rel="stylesheet" media="all"></script>

	</head>

	<body>

		<h1>The Twelve Days of Christmas</h1>

		<?php

			$days_of_christmas = [
				['first', 'a partridge in a pear tree'],
				['second', 'Two turtle doves'],
				['third', 'Three French hens'],
				['fourth', 'Four calling birds'],
				['fifth', 'Five golden rings'],
				['sixth', 'Six geese-a-laying'],
				['seventh', 'Seven swans-a-swimming'],
				['eighth', 'Eight maids-a-milking'],
				['ninth', 'Nine ladies dancing'],
				['tenth', 'Ten lords-a-leaping'],
				['eleventh', 'Eleven pipers piping'],
				['twelfth', 'Twelve drummers drumming']
			];	

			for ($i = 0; $i < count($days_of_christmas); $i++) { 
				echo "<div id='day" . ($i + 1) . "' class='dayOfXmas'>";
				echo "On the " . $days_of_christmas[$i][0] . " day of Christmas my true love gave to me<br>";
				for ($j = $i; $j >= 0; $j--) { 
					if ($i == 0) {
						echo ucfirst($days_of_christmas[0][1]) . "<br><br>";
					} else if ($j == 0) {
						echo "And " . $days_of_christmas[$j][1] . "<br><br>";
					} else {
						echo $days_of_christmas[$j][1] . "<br>";
					}
				}
				echo "</div>";
			}

		?>

		<button id="nextBtn">Start</button>

		<script>
			
			day1 = document.getElementById('day1')
			day2 = document.getElementById('day2')
			day3 = document.getElementById('day3')
			day4 = document.getElementById('day4')
			day5 = document.getElementById('day5')
			day6 = document.getElementById('day6')
			day7 = document.getElementById('day7')
			day8 = document.getElementById('day8')
			day9 = document.getElementById('day9')
			day10 = document.getElementById('day10')
			day11 = document.getElementById('day11')
			day12 = document.getElementById('day12')
			nextBtn = document.getElementById('nextBtn')

			var counter = 0

			nextBtn.onclick = function() {
				var days = [day1, day2, day3, day4, day5, day6, day7, day8, day9, day10, day11, day12]
				days[counter].style.display = 'block'
				days.splice(counter, 1)
				for (i = 0; i < days.length; ++i) {
					days[i].style.display = 'none'
				}

				nextBtn.innerHTML = "Next"
				nextBtn.style.backgroundColor = "green"
				nextBtn.className = ""
				counter++

				if (counter == (days.length + 1)) {
					counter = 0
					nextBtn.innerHTML = "Restart&nbsp;&nbsp;"
					nextBtn.style.backgroundColor = "#f4b642"
					nextBtn.className = "hvr-icon-spin"
				}
			}

		</script>

	</body>

</html>