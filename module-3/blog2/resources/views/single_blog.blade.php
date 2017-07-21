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

		<div class="row">

			<div class="col s12 m3">    

				<form method="POST" autocomplete="off">
					<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="blogId" id="blogId" value="{{ $blog->id }}">
					<div class="input-field inline">
						<input id="tagInput" name="tagInput" type="text" class="autocomplete" required>
						<label for="tagInput">Tag this article</label>
					</div>
				</form>

			</div>

			<div class="col s12 m3 l2 left valign-wrapper">             
				<button class="btn blue accent-3" id="tagBtn">Add tag</button>
			</div>

		</div>

	</div>

	<script type="text/javascript">

		$("#tagBtn").click(function() {
			var token = $("#_token").val()
			var blogId = $("#blogId").val()
			var tagInput = $("#tagInput").val()
			var url = window.location.href+'/addTag'

			$.ajax({
				url: url,
				method: "POST",
				data: {
					_token : token,
					tagInput : tagInput,
					blogId : blogId,
				},
				crossDomain: true,
				success: function(data) {
    				console.log("Success")
					$("#tagBox").html(data)
				},
				error: function(response, data) {
    				console.log("Error")
    				console.log(response)
    				console.log(data)
				},
			})
		})

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