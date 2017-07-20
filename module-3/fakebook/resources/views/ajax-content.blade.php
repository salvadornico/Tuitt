@foreach($requests as $request)

	<img src='{{$request->avatar}}'>
	{{$request->name}}
	<br>

@endforeach