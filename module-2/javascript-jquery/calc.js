// ------------------- Calculator -----------------------

var btn1 = document.getElementById('btn1')
var btn2 = document.getElementById('btn2')
var btn3 = document.getElementById('btn3')
var btn4 = document.getElementById('btn4')
var btn5 = document.getElementById('btn5')
var btn6 = document.getElementById('btn6')
var btn7 = document.getElementById('btn7')
var btn8 = document.getElementById('btn8')
var btn9 = document.getElementById('btn9')
var btn0 = document.getElementById('btn0')
var btnPlus = document.getElementById('btnPlus')
var btnMinus = document.getElementById('btnMinus')
var btnEquals = document.getElementById('btnEquals')
var btnClear = document.getElementById('btnClear')
var calcDisplay1 = document.getElementById('calcDisplay1')
var calcDisplay2 = document.getElementById('calcDisplay2')
var calcDisplayOp = document.getElementById('calcDisplayOp')

var calcNum1 = ""
var calcNum2 = ""
var isFirstNum = true
var operation = ""
var result = 0
var isResult = false

function btnClick(num) {
	if (isResult) {
		clear()
		isResult = false
	} 
	if (isFirstNum) {
		calcNum1 += num;
		calcDisplay1.innerHTML = calcNum1
	} else {
		calcNum2 += num;
		calcDisplay2.innerHTML = calcNum2
	}
}

btn1.onclick = function() {
	btnClick("1")
}

btn2.onclick = function() {
	btnClick("2")
}

btn3.onclick = function() {
	btnClick("3")
}

btn4.onclick = function() {
	btnClick("4")
}

btn5.onclick = function() {
	btnClick("5")
}

btn6.onclick = function() {
	btnClick("6")
}

btn7.onclick = function() {
	btnClick("7")
}

btn8.onclick = function() {
	btnClick("8")
}

btn9.onclick = function() {
	btnClick("9")
}

btn0.onclick = function() {
	btnClick("0")
}


function clear() {
	calcNum1 = ""
	calcNum2 = ""
	operation = ""
	calcDisplay1.innerHTML = ""
	calcDisplay2.innerHTML = ""
	calcDisplayOp.innerHTML = ""
}

btnClear.addEventListener("click", clear)


// ---------- Operations ---------------

btnPlus.onclick = function() {
	isFirstNum = false
	operation = "add"
	calcDisplayOp.innerHTML = " + "
}

btnMinus.onclick = function() {
	isFirstNum = false
	operation = "subtract"
	calcDisplayOp.innerHTML = " - "
}

btnMult.onclick = function() {
	isFirstNum = false
	operation = "multiply"
	calcDisplayOp.innerHTML = " x "
}

btnDiv.onclick = function() {
	isFirstNum = false
	operation = "divide"
	calcDisplayOp.innerHTML = " ÷ "
}

btnEquals.onclick = function() {
	num1 = parseInt(calcNum1)
	num2 = parseInt(calcNum2)

	switch (operation) {
		case 'add':
			result = num1 + num2
			break
		case 'subtract':
			result = num1 - num2
			break
		case 'multiply':
			result = num1 * num2
			break
		case 'divide':
			result = num1 / num2
			break
		default:
			clear()
			calcDisplay1.innerHTML = "Something went wrong.."
	}

	clear()
	isResult = true
	isFirstNum = true
	calcDisplay1.innerHTML = result
}