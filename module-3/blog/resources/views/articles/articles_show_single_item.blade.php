<!-- article_list.blade.php -->
@extends('applayout')

@section('title')
	{{ $article->title }}
@endsection

@section('main_content')

	<h1>{{ $article->title }}</h1>
	<p>{{ $article->content }}</p>

	<a href="{{url("articles/$article->id/delete")}}">Delete</a>

@endsection