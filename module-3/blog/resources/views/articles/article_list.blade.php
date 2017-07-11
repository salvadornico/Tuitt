<!-- article_list.blade.php -->
@extends('applayout')

@section('main_content')

	<h3>List of Articles</h3>

	<ul>
		<li>{{ $article1 }}</li>
		<li>{{ $article2 }}</li>
	</ul>

@endsection