@extends("template")

@section("title")
	Blogsdot
@endsection

@section("main_content")

	<div class="container">

		<h1>All Articles</h1>
		
		<ul>
			@foreach($all_blogs as $blog)

				<li>
					<a href="{{ url("/blog/$blog->id") }}">
						{{ $blog->title }}
					</a>
				</li>

			@endforeach			
		</ul>

		<h4>Search by tag</h4>
		@foreach($all_tags as $tag)
			<a href="{{ url("/tag/$tag->id") }}">
				<div class="chip">
					{{ $tag->name }}
				</div>
			</a>
		@endforeach

	</div>

@endsection