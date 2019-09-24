





<div class="restaurant-preview">
	<a href="restaurants/{{$restaurant->id}}">
		<div class="restaurant-preview-name">
			{{$restaurant->name}}
		</div>
		<div class="restaurant-preview-address">
			{{$restaurant->address}} <br>
			{{$restaurant->suburb}} {{$restaurant->postcode}} {{$restaurant->state}}
		</div>
		<div class="restaurant-preview-img" 
			@if (($product = $restaurant->products()->whereNotNull('image')->first()))
				style="background-image: url('{{$product->image}}');"
			@endif>
		</div>
	</a>
</div>