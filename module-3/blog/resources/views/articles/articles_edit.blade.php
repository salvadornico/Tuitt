@extends('layouts/applayout')

@section('title')
	EDIT - {{ $article->title }}
@endsection

@section('main_content')

	<div class="container">
		
		<h1>
			Create a new article
		</h1>

		<form action="" method="POST">
			{{ csrf_field() }}
			Title: 
			<input type="text" name="title" value="{{ $article->title }}">

			<br>

			Content:
			<br>
			<textarea name="content">{{ $article->content }}</textarea>
			<br>
			<input type="submit" class="btn green"></input>
		</form>

	</div>


@endsection