@foreach($blogTags as $tag)
	<a href="{{ url("/tag/$tag->id") }}">
		<div class="chip">
			{{ $tag->name }}
		</div>
	</a>
@endforeach