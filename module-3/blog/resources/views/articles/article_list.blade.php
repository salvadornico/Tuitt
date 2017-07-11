<!-- article_list.blade.php -->
@extends('applayout')

@section('title')
	{{ $title }}
@endsection

@section('main_content')

	<h1>{{ $title }}</h1>

	<ul>

		@foreach($all_articles as $article)
			<li>
				<a href="{{url( "articles/$article->id" )}}">{{ $article->title }}</a>
			</li>
		@endforeach

	</ul>

@endsection