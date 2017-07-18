<!DOCTYPE html>
<html>
	<head>

		<title>Todo List</title>

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
	<body class="purple lighten-4">

		<nav class="purple darken-4">
			<div class="nav-wrapper">
				<a href="/" class="brand-logo">Todo List</a>
			</div>
		</nav>

		<main>
			
			<div class="container">
				
				<form method="POST" class="card">
					{{ csrf_field() }}
					<div class="card-content">
						<div class="row">
							<div class="col s12 offset-s1">
								<h3>Add New Task</h3>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m3 offset-m1">
								<input id="name" name="name" type="text" class="validate">
								<label class="active" for="name">Task Name</label>
							</div>
							<div class="input-field col s12 m7">
								<input id="description" name="description" type="text" class="validate">
								<label class="active" for="description">Task Description</label>
							</div>
						</div>
						<div class="row">
							<div class="col s11 right-align">
								<button class="btn-floating btn-large blue" type="submit">
									<i class="material-icons">add</i>
								</button>
							</div>
						</div>						
					</div>
				</form>

				<div class="row">

					<div class="row">
						<div class="col s12">
							<h4>Pending Tasks</h4>
						</div>
					</div>
					<div class="row">
						<ul>
							@foreach($pending_tasks as $task)

								<div class="col s12 m4">									
									<li class="card">
										<div class="card-content">
												<span class="task-name">{{ $task->name }}</span>
												<br>
												<span class="task-description">{{ $task->description }}</span>
										</div>
										<div class="card-action">
											<a href="{{ url("mark-done/$task->id") }}" class="green-text">
												<i class="material-icons">done</i>
											</a>
											<a href="{{ url("delete/$task->id") }}" class="red-text">
												<i class="material-icons">delete</i>
											</a>
										</div>
									</li>
								</div>

							@endforeach
						</ul>
					</div>

				</div>

				<div class="row">

					<div class="row">
						<div class="col s12">
							<h4>Completed Tasks</h4>
						</div>
					</div>
					<div class="row">
						<ul>
							@foreach($completed_tasks as $task)

								<div class="col s12 m4">									
									<li class="card">
										<div class="card-content">
												<span class="task-name">{{ $task->name }}</span>
												<br>
												<span class="task-description">{{ $task->description }}</span>
										</div>
										<div class="card-action">
											<a href="{{ url("mark-undone/$task->id") }}" class="grey-text text-darken-2">
												<i class="material-icons">replay</i>
											</a>
											<a href="{{ url("delete/$task->id") }}" class="red-text">
												<i class="material-icons">delete</i>
											</a>
										</div>
									</li>
								</div>

							@endforeach
						</ul>
					</div>

				</div>

			</div>

		</main>

		<footer class="page-footer center-align purple darken-4 white-text">
			<span>&copy; 2017 Footer</span>
		</footer>

	</body>
</html>