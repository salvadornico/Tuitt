<!-- article_list.blade.php -->
@extends('layouts/applayout')

@section('title')
	{{ $title }}
@endsection

@section('main_content')

	<div class="container">
		
		<h1>{{ $title }}</h1>

		<ul>

			@foreach($all_articles as $article)
				<li>

					<a href="{{ url("articles/$article->id") }}">
						<h5>{{ $article->title }}</h5>
					</a>

					<div>

						<a href="{{ url("articles/$article->id/edit") }}" class="btn blue">
							Edit
						</a>

						<a href="{{ url("articles/$article->id/delete") }}" class="btn red">
							Delete
						</a>

					</div>

				</li>
			@endforeach

		</ul>

		<h4>
			<a href="{{ url("articles/create") }}" class="btn-large green">
				Create a new article
			</a>
		</h4>

	</div>


@endsection