@extends("template")

@section("title")
	{{ $blog->title }}
@endsection

@section("main_content")

	<div class="container">

		<h1>{{ $blog->title }}</h1>
		
		<p>
			{{ $blog->content }}
		</p>

		<hr>

		<div id="tagBox">
			@foreach($tags as $tag)
				<a href="{{ url("/tag/$tag->id") }}">
					<div class="chip">
						{{ $tag->name }}
					</div>
				</a>
			@endforeach
		</div>

		<form method="POST">
			{{-- <input type="hidden" name="csrf" id="csrf" value="{{ csrf_token() }}"> --}}
			{{ csrf_field() }}
			<input type="hidden" name="blogId" id="blogId" value="{{ $blog->id }}">
			<div class="input-field inline">
				<input id="tagInput" name="tagInput" type="text" required>
				<label for="tagInput">Tag this article</label>
			</div>	

			<button class="btn blue accent-3" id="tagBtn">Add tag</button>
			
		</form>


		<script type="text/javascript">
			// $("#tagBtn").click(function() {
			// 	var token = $("#csrf").val()
			// 	var blogId = $("#blogId").val()
			// 	var tagInput = $("#tagInput").val()
			// 	$.post('addTag',
			// 		{
			// 			_token : token,
			// 			tagInput : tagInput,
			// 			blogId : blogId,
			// 		},
			// 		function(data) {
			// 			$("#tagBox").html(data)
			// 		}
			// 	)
			// })
		</script>

	</div>

@endsection