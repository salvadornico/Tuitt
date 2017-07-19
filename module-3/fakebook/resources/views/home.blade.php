@extends("layouts/template")

@section("main_content")

	@if(Session::has("message"))
		<script type="text/javascript">
			Materialize.toast('{{ Session::get("message") }}', 3000)
		</script>
	@endif

	<div class="row">

		<div class="col s12 l10">

			<div class="row user-list">

				<h4>Friends</h4>
				
				@foreach($friends as $user)

					<div class="col s6 m4 l3">
						<a href="{{ url("/user/$user->id") }}" class="card">
							<div class="card-image">
								<img src="{{ $user->avatar }}">
	              				<span class="card-title">
	              					{{ $user-> name }}
	              				</span>
	            			</div>
						</a>
	        		</div>

				@endforeach

			</div>

			<div class="row user-list">

				<h4>Not Friends</h4>
				
				@foreach($not_friends as $user)

					<div class="col s6 m4 l3">
						<a href="{{ url("/user/$user->id") }}" class="card">
							<div class="card-image">
								<img src="{{ $user->avatar }}">
	              				<span class="card-title">
	              					{{ $user-> name }}
	              				</span>
	            			</div>
						</a>
	        		</div>

				@endforeach

			</div>

		</div>

		<div class="col s12 l2">

			<h4>Hi {{Auth::user()->name}}!</h4>

			<h5>Friend requests</h5>

			<span class="request-label">Received</span>
			<ul>

				@if(count($received_requests))
					@foreach($received_requests as $request)
						<li>
							<a href="{{ url("/user/$request->id") }}">
								{{ $request->name }}
							</a>
							<br>
							<a href="{{ url("/accept_request/$request->id") }}" class="request-button green-text">
								<i class="material-icons">thumb_up</i>
							</a>
							<a href="{{ url("/deny_request/$request->id") }}" class="request-button red-text">
								<i class="material-icons">thumb_down</i>
							</a>
						</li>
					@endforeach
				@else
					No received requests
				@endif

			</ul>

			<span class="request-label">Pending</span>
			<ul>

				@if(count($sent_requests))			
					@foreach($sent_requests as $request)
						<li>
							<a href="{{ url("/user/$request->id") }}">{{ $request->name }}</a>
						</li>
					@endforeach
				@else
					No pending requests
				@endif

			</ul>

		</div>

	</div>

@endsection