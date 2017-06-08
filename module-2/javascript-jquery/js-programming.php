<!DOCTYPE html>
<html>

	<head>
		<title>JS Programming</title>
	</head>

	<style type="text/css">

		* {
			font-family: sans-serif;
		}

		.blocks {
			width: 75px;
			height: 50px;
			margin: 5px;
			display: inline-block;
		}

	</style>

	<script type="text/javascript" src="js-programming.js" defer></script>

	<body>

		<input type="number" id="input1">
		<input type="number" id="input2">
		<br>
		<button id="add">Add</button>
		<button id="subtract">Subtract</button>
		<button id="max">Which is bigger?</button>

		<h3 id="result"></h3>

		<hr> <!-- Random number game -->

		<h2>Guess the Number!</h2>

		<input type="number" id="guessField" min="0" max="100">
		<button id="guessBtn">Check</button>

		<h4 id="guessClue">It's between 1 and 100</h4>
		<p id="guessTally"></p>

		<hr> <!-- Loops -->

		<input type="number" id="loopInput" min="0">
		<button id="loopBtn">Loop</button>

		<div id="loopOutput"></div>

		<hr>  <!-- Quiz -->

		<h3>Quiz Time!</h3>
		<div id="quizDisplay"></div>
		<br>
		<div id="quizControls">
			<input type="text" id="quizInput">
			<button id="quizBtn">Start</button>
		</div>
		<button id="quizReset">Reset</button>
		

	</body>

</html>