<!DOCTYPE html>
<html>
	<head>

		<title>Fakebook</title>

		<!-- Google Fonts-->
		<link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
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

		<nav class="indigo darken-1">
			<div class="nav-wrapper">
				<a href="/" class="brand-logo">
					Fakebook
				</a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">

					@if(Auth::user())
						<li>
							<a href="{{ route('logout') }}"
								onclick="event.preventDefault();
							 		document.getElementById('logout-form').submit();">
								Logout
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</li>
					@else
						<li><a href="{{ url("/login")}}">Login</a></li>
						<li><a href="{{ url("/register")}}">Register</a></li>
					@endif

				</ul>
			</div>
		</nav>

		<main>
			
			@yield("main_content")

		</main>

		<footer class="footer-copyright center-align indigo darken-1 white-text">
			<span>&copy; 2017 Footer</span>
		</footer>

	</body>
</html>