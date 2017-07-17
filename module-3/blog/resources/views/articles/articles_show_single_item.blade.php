<!-- article_list.blade.php -->
@extends('layouts/applayout')

@section('title')
	{{ $article->title }}
@endsection

@section('main_content')

	<div class="container">

		<h1>{{ $article->title }}</h1>
		<p>{{ $article->content }}</p>

		<h5>Comments</h5>
		<ul class="browser-default">
			@foreach($article->comments as $comment)
				<li>
					{{ $comment->content }}
					<span class="grey-text text-lighten-1">
						({{ $comment->updated_at }})
					</span>
				</li>
			@endforeach
		</ul>

		<form action="" method="POST">
			{{ csrf_field() }}
			Comment:
			<br>
			<textarea name="content"></textarea>
			<br>
			<input type="submit" class="btn blue"></input>
		</form>
		
	</div>

@endsection