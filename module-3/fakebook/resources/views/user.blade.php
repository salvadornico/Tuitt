@extends("layouts/template")

@section("main_content")

	<div class="container center-align">

		@if(Session::has("message"))
			<script type="text/javascript">
				Materialize.toast('{{ Session::get("message") }}', 3000)
			</script>
		@endif

		<div class="row" id="profile-row">
				<div class="col s12 m6">
						<div class="card" id="profile">
							<div class="card-image">

									<img src="{{ $user->avatar }}">

									<span class="card-title">{{ $user->name }}</span>

									@if(!$isFriend)

										<a href="{{ url("/user/$user->id/add") }}" class="btn-floating halfway-fab waves-effect waves-light green tooltipped" data-position="top" data-delay="50" data-tooltip="Add as friend">
											<i class="material-icons">add</i>
										</a>

									@endif

							</div>
							<div class="card-content">
									<p>
										Wubba lubba dub dub
									</p>
							</div>
						</div>
					</div>
			</div>

			<div class="row">
				<p>
					Cupcake ipsum dolor sit amet pie. Sesame snaps powder cake dragée fruitcake cookie icing pie. Sweet roll I love marshmallow danish. Tootsie roll liquorice pastry halvah cake chocolate wafer lollipop. Sweet roll powder tiramisu I love chocolate bar lollipop danish powder. Muffin I love croissant oat cake I love wafer jujubes croissant tootsie roll.
				</p>
				<p>
				Wafer muffin bear claw gingerbread. Macaroon halvah oat cake apple pie sugar plum I love. Marshmallow cake chocolate gummi bears chupa chups. Wafer toffee marshmallow croissant jelly beans ice cream gingerbread pudding I love. Chocolate bar jelly-o caramels tootsie roll. Chocolate bar chocolate dessert toffee gummies cake croissant. Dessert I love sweet chocolate cake sweet roll I love caramels lollipop cheesecake. Toffee gummi bears bear claw candy. Brownie brownie chocolate.
			</p>
				<p>
				I love dragée candy canes dragée. Macaroon powder liquorice. Brownie powder halvah carrot cake marzipan cheesecake gingerbread. Lollipop pastry cupcake macaroon lollipop chocolate. Halvah bear claw lemon drops cake sweet roll pie biscuit. Candy carrot cake gummies I love dragée marshmallow. Icing croissant marshmallow sesame snaps. Sweet roll pastry tiramisu halvah I love jujubes soufflé. Marzipan I love toffee lemon drops sugar plum gummies cotton candy jelly ice cream. Carrot cake I love cheesecake donut I love marshmallow.
			</p>
			</div>

	</div>

@endsection