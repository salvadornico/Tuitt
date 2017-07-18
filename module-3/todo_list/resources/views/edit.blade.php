@extends("template")

@section("main_content")
			
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
						<input id="name" name="name" type="text" value="{{ $task->name }}" required>
						<label class="active" for="name">Task Name</label>
					</div>
					<div class="input-field col s12 m7">
						<input id="description" name="description" type="text" value="{{ $task->description }}" required>
						<label class="active" for="description">Task Description</label>
					</div>
				</div>
				<div class="row">
					<div class="col s11 right-align">
						<button class="btn-floating btn-large lime accent-4 waves-dark" type="submit">
							<i class="material-icons">done</i>
						</button>
					</div>
				</div>						
			</div>
		</form>

	</div>

@endsection