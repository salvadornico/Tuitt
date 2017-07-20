@extends("template")

@section("title")
	{{ $tag->name }}
@endsection

@section("main_content")

	<div class="container">

		<h1>Blogs tagged: {{ $tag->name }}</h1>

		<ul>
			
			@foreach($blogs as $blog)
				<a href="{{ url("/blog/$blog->id") }}">
					<li>
						{{ $blog->title }}
					</li>
				</a>
			@endforeach

		</ul>

	</div>

@endsection