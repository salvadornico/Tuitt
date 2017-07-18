@extends("template")

@section("main_content")
			
	<div class="container">

		
		@if(Auth::user())

			<form method="POST" class="card z-depth-3">
				{{ csrf_field() }}
				<div class="card-content">
					<div class="row">
						<div class="col s12 offset-s1">
							<h3>Add New Task</h3>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m3 offset-m1">
							<input id="name" name="name" type="text" required>
							<label class="validate" for="name">Task Name</label>
						</div>
						<div class="input-field col s12 m7">
							<input id="description" name="description" type="text" required>
							<label class="validate" for="description">Task Description</label>
						</div>
					</div>
					<div class="row">
						<div class="col s11 right-align">
							<button class="btn-floating btn-large lime accent-4 waves-dark" type="submit">
								<i class="material-icons">add</i>
							</button>
						</div>
					</div>						
				</div>
			</form>
			
		@endif

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
							<li class="card small">

								<div class="card-content">
										<span class="card-title">{{ $task->name }}</span>
										<p>{{ $task->description }}</p>
								</div>

								@if(Auth::user())
									<div class="card-action">
										<a href="{{ url("mark-done/$task->id") }}" class="green-text tooltipped" data-position="top" data-delay="50" data-tooltip="Mark as done">
											<i class="material-icons">done</i>
										</a>
										<a href="{{ url("edit/$task->id") }}" class="grey-text text-darken-2 tooltipped" data-position="top" data-delay="50" data-tooltip="Edit">
											<i class="material-icons">edit</i>
										</a>
										@if(Auth::user()->role == "admin")
											<a href="{{ url("delete/$task->id") }}" class="red-text tooltipped" data-position="top" data-delay="50" data-tooltip="Delete">
												<i class="material-icons">delete</i>
											</a>
										@endif
									</div>
								@endif

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
							<li class="card small">

								<div class="card-content">
										<span class="card-title">{{ $task->name }}</span>
										<p>{{ $task->description }}</p>
								</div>

								@if(Auth::user() && Auth::user()->role == "admin")
									<div class="card-action">
										<a href="{{ url("mark-undone/$task->id") }}" class="grey-text text-darken-2 tooltipped" data-position="top" data-delay="50" data-tooltip="Mark as undone">
											<i class="material-icons">replay</i>
										</a>
										<a href="{{ url("delete/$task->id") }}" class="red-text tooltipped" data-position="top" data-delay="50" data-tooltip="Delete">
											<i class="material-icons">delete</i>
										</a>
									</div>
								@endif

							</li>
						</div>

					@endforeach
				</ul>
			</div>

		</div>

	</div>

@endsection