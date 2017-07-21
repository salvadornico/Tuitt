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
			@foreach($blogTags as $tag)
				<a href="{{ url("/tag/$tag->id") }}">
					<div class="chip">
						{{ $tag->name }}
					</div>
				</a>
			@endforeach
		</div>

		<form method="POST" autocomplete="off">
			{{-- <input type="hidden" name="csrf" id="csrf" value="{{ csrf_token() }}"> --}}
			{{ csrf_field() }}
			<input type="hidden" name="blogId" id="blogId" value="{{ $blog->id }}">
			<div class="input-field inline">
				<input id="tagInput" name="tagInput" type="text" class="autocomplete" required>
				<label for="tagInput">Tag this article</label>
			</div>	

			<button class="btn blue accent-3" id="tagBtn">Add tag</button>

		</form>



	</div>

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

		$(document).ready(function() {

			$('input.autocomplete').autocomplete({
    			data: {
      				@foreach($all_tags as $tag)
      					"{{ $tag->name }}": null,
      				@endforeach
    			},
    			limit: 20,
    			minLength: 1,
  			})

		})
	</script>

@endsection