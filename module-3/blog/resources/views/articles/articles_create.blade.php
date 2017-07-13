@extends('applayout')

@section('main_content')

	<h1>
		Create a new article
	</h1>

	<form action="" method="POST">
		{{ csrf_field() }}
		Title: <input type="text" name="title">
		<br>
		Content:
		<br>
		<textarea name="content"></textarea>
		<br>
		<input type="submit"></input>
	</form>

@endsection