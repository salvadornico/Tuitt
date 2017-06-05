function external_function() {
	alert("This is external")
}

var header = document.getElementById("heading")
header.addEventListener("mousedown", changeMe)
header.addEventListener("mouseup", revert)

function changeMe() {
	header.innerHTML = "Boo ;-)"
	header.style.color = "red"
}

function revert() {
	header.innerHTML = "This is a heading"
	header.style.color = "black"
}

var container = document.getElementById("container")

function hideAll() {
	container.style.display = "none"
}

function showAll() {
	container.style.display = "block"
}

function baconize() {
	document.getElementById("paragraph").innerHTML = "Bacon ipsum dolor amet shankle bresaola rump chicken drumstick ball tip short loin tail prosciutto. Pastrami picanha chicken, bresaola biltong rump kielbasa shankle beef ribs. T-bone turducken cow beef ribs corned beef ham cupim rump brisket tail. Jerky cupim pancetta, pig shankle turducken fatback spare ribs strip steak filet mignon."
}

var image = document.getElementById("image")
image.addEventListener("click", puppy)

function puppy() {
	image.src = "dog.jpg"
}

function embiggen() {
	image.height = 50
}

var helloWorld = document.getElementById("hello-world")
var helloBtn = document.getElementById("hello-btn")
var worldBtn = document.getElementById("world-btn")

helloBtn.addEventListener("click", hello)
worldBtn.addEventListener("click", world)

function hello() {
	helloWorld.innerHTML = "Hello"
	helloBtn.style.display = "none"
	worldBtn.style.display = "block"
}

function world() {
	helloWorld.innerHTML = "World"
	worldBtn.style.display = "none"
	helloBtn.style.display = "block"
}

var num1 = document.getElementById("num1")
var num2 = document.getElementById("num2")
var sumDisplay = document.getElementById("sum-display")
var addBtn = document.getElementById("add-btn")
var multBtn = document.getElementById("mult-btn")

addBtn.addEventListener("click", add)
multBtn.addEventListener("click", multiply)

function add() {
	sumDisplay.innerHTML = parseInt(num1.value) + parseInt(num2.value)
}

function multiply() {
	sumDisplay.innerHTML = parseInt(num1.value) * parseInt(num2.value)
}
