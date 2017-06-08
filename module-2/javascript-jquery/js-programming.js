var input1 = document.getElementById('input1')
var input2 = document.getElementById('input2')
var addBtn = document.getElementById('add')
var subtractBtn = document.getElementById('subtract')
var maxBtn = document.getElementById('max')
var result = document.getElementById('result')

addBtn.onclick = function() {
	var num1 = parseInt(input1.value)
	var num2 = parseInt(input2.value)

	result.innerHTML = 'Sum is ' + (num1 + num2)
}

subtractBtn.onclick = function() {
	var num1 = parseInt(input1.value)
	var num2 = parseInt(input2.value)

	result.innerHTML = 'Difference is ' + (num1 - num2)
}

maxBtn.onclick = function() {
	var num1 = parseInt(input1.value)
	var num2 = parseInt(input2.value)

	if (num1 > num2) {
		result.innerHTML = num1 + " is greater than " + num2
	} else if (num1 < num2) {
		result.innerHTML = num2 + " is greater than " + num1
	} else {
		result.innerHTML = "Both numbers are equal"
	}
} 


// ---------------- Random number game -----------------

var guessField = document.getElementById('guessField')
var guessBtn = document.getElementById('guessBtn')
var guessClue = document.getElementById('guessClue')

var randNum = Math.floor((Math.random() * 100) + 1 )

function makeGuess() {
	var guess = parseInt(guessField.value)

	if (guess > randNum) {
		guessClue.innerHTML = "Lower.."
		guessTally.innerHTML += "Lower than " + guess + "<br>"
	} else if (guess < randNum) {
		guessClue.innerHTML = "Higher.."
		guessTally.innerHTML += "Higher than " + guess + "<br>"
	} else if (guess == randNum) {
		guessClue.innerHTML = "Got it!"
		guessTally.innerHTML += guess + " - BINGO!<br>"
	} else {
		guessClue.innerHTML = "You didn't put anything.."
	}
}

guessBtn.addEventListener("click",makeGuess)
guessField.addEventListener("keydown", function(e) {
	if (e.keyCode === 13) {
		makeGuess()
		guessField.value = ""
	}
})

// -------------------- Loops -----------------------------

var loopInput = document.getElementById('loopInput')
var loopBtn = document.getElementById('loopBtn')
var loopOutput = document.getElementById('loopOutput')

loopBtn.onclick = function() {
	loopOutput.innerHTML = ""
	numLoops = parseInt(loopInput.value)

	for (i = 0; i < numLoops; i++) {
		for (j = 0; j < numLoops; j++) {
			if ((i+j)%2 == 0) {
				loopOutput.innerHTML += '<img src="original.gif" class="blocks">'
			} else {
				loopOutput.innerHTML += '<img src="mexinyan.gif" class="blocks">'
			}
		}
		loopOutput.innerHTML += "<br>"
	}
}


// -------------------- Quiz ---------------------------

var quizDisplay = document.getElementById('quizDisplay')
var quizInput = document.getElementById('quizInput')
var quizBtn = document.getElementById('quizBtn')
var quizControls = document.getElementById('quizControls')
var quizReset = document.getElementById('quizReset')

questions = [
	['First letter in armadillo', 'A'],
	['Second letter in obligatory', 'B'],
	['Third letter in dockmaster', 'C'],
	['Fourth letter in traditional', 'D'],
	['Fifth letter in commerce', 'E']
]

reset()

function reset() {
	quizCounter = 0
	quizScore = 0
	quizDisplay.innerHTML = ""
	quizControls.style.display = "block"
	quizBtn.innerHTML = "Start"
	quizInput.style.display = "none"
	quizReset.style.display = "none"	
}

function submit() {
	quizInput.style.display = "inline"
	quizBtn.innerHTML = "Submit"

	// displays only until questions run out
	if (quizCounter < questions.length) {
		quizDisplay.innerHTML = questions[quizCounter][0]
	}

	// only executes after displaying first question
	if (quizCounter > 0) {
		// checks answer of previously displayed question
		if (quizInput.value.toUpperCase() == questions[quizCounter-1][1]) {
			quizScore++
		}
	}

	quizCounter++
	quizInput.value = ""
	quizInput.focus()

	// final score display when at the end of questions list
	if (quizCounter == (questions.length + 1)) {
		quizControls.style.display = "none"

		quizDisplay.innerHTML = ""
		for (i = 0; i < quizScore; ++i) {
			quizDisplay.innerHTML += '<img src="original.gif" class="blocks">'
		}
		quizDisplay.innerHTML += "<br>Your final score is " + quizScore + "!"

		quizCounter = 0
		quizReset.style.display = "inline"
	}
}

quizBtn.addEventListener("click", submit)

quizInput.addEventListener("keydown", function(e) {
	if (e.keyCode === 13) {
		submit()
	}
})

quizReset.addEventListener("click", reset)