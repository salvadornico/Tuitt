<!DOCTYPE html>
<html>
	<head>

		<title>@yield("title")</title>

		<!-- Google Fonts-->
      	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      	<!-- Font Awesome -->
      	<script src="https://use.fontawesome.com/8a3d0f859b.js"></script>

		<!-- Materialize CSS -->
  		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">

  		<!-- Custom CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">

		<!-- jQuery -->
	    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

		<!-- Materialize JS -->
	  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>

		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta charset="UTF-8">

	</head>
	<body>

		<nav class="indigo">
			<div class="nav-wrapper">
				<a href="/articles" class="brand-logo">Header</a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li><a href="#">Link 1</a></li>
					<li><a href="#">Link 2</a></li>
					<li><a href="#">Link 3</a></li>
				</ul>
			</div>
		</nav>

		<main>
			@yield("main_content")
		</main>

		<footer class="page-footer center-align indigo white-text">
			<span>&copy; 2017 Footer</span>
		</footer>

	</body>
</html>