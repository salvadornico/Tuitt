<!DOCTYPE html>
<html>
	<head>
		<title>@yield("title")</title>
	</head>
	<body>

		<h2>Heading</h2>
		<nav>
			<ul>
				<li>Link 1</li>
				<li>Link 2</li>
			</ul>
		</nav>

		<main>
			@yield("main_content")
		</main>

		<footer>
			<h2>Footer</h2>
		</footer>

	</body>
</html>