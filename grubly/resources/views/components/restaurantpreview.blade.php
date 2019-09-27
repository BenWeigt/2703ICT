{{-- components.restaurantpreview --}}
{{-- This view is never used directly, rather included as part of another --}}

{{-- Restaurant display --}}
<div class="restaurant-preview">
	<a class="restaurant-preview-link" href="restaurants/{{$restaurant->id}}">
		<div class="restaurant-preview-name">
			{{$restaurant->name}}
		</div>
		<div class="restaurant-preview-address">
			{{$restaurant->address}} <br>
			{{$restaurant->suburb}} {{$restaurant->postcode}} {{$restaurant->state}}

			{{-- Administrators also see the restaurants email address --}}
			@admin
				<br>Email: {{$restaurant->email}}
			@endadmin
		</div>

		{{-- Restaurants use their first product image as a backdrop --}}
		<div class="restaurant-preview-img" 
			@if (($product = $restaurant->products()->whereNotNull('image')->first()))
				style="background-image: url('{{$product->image}}');"
			@endif>
		</div>
	</a>

	{{-- Administrators see verification / unverification controls --}}
	@admin

		{{-- Unverify --}}
		@if ($restaurant->verification)
			<a class="restaurant-preview-unverify" href="#" onclick="event.preventDefault(); document.getElementById('unverify-form-{{$restaurant->id}}').submit();">
				unverify
			</a>
			<form id="unverify-form-{{$restaurant->id}}" action="{{route('unverify')}}" method="POST" style="display: none;">
				@csrf
				<input type="hidden" value="{{$restaurant->id}}" name="id">
			</form>

		{{-- Verify --}}
		@else
			<a class="restaurant-preview-verify" href="#" onclick="event.preventDefault(); document.getElementById('verify-form-{{$restaurant->id}}').submit();">
				verify
			</a>
			<form id="verify-form-{{$restaurant->id}}" action="{{route('verify')}}" method="POST" style="display: none;">
				@csrf
				<input type="hidden" value="{{$restaurant->id}}" name="id">
			</form>
		@endif
	@else

		{{-- Restaurants see their verification status on themselves --}}
		@restaurant
			@if (\Auth::user()->id === $restaurant->id)
				@if ($restaurant->verification)
					<span class="restaurant-preview-verified">
						verified
					</span>
				@else
					<span class="restaurant-preview-pending">
						verification<br>pending
					</span>
				@endif
			@endif
		@endrestaurant
	@endadmin
</div>