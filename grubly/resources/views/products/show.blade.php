<div class="product" data-id="{{$product->id}}">
	<div class="product-name">
		{{$product->name}}<br>
		<span class="product-price">
			${{number_format($product->price, 2)}}
		</span>
	</div>
	
	<div class="product-img" @if ($product->image)style="background-image: url('{{$product->image}}');"@endif>
	</div>
</div>