@extends("layouts/template")

@section("main_content")

	<div class="container">

		<button class="btn" id="prBtn">Pending Requests</button>

		<div id="pr"></div>

		<form method="POST" class="hide">
			<input type="text" id="csrf" value="{{ csrf_token() }}">
		</form>

	</div>

	<script type="text/javascript">
		$('#prBtn').click(function() {
			var token = $('#csrf').val()
			$.post('getPendingRequests',
				{ _token : token, },
				function(data) {
					$('#pr').html(data)
				}
			)
		})
	</script>

@endsection