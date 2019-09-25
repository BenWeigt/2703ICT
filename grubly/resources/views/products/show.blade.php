@can('addToCart', $product)
	<div class="product purchaseable" id="product-{{$product->id}}" onclick="window.cart.addProduct({{$product->id}})">
		<div class="product-name">
			{{$product->name}}<br>
			<span class="product-price">
				${{number_format($product->price, 2)}}
			</span>
		</div>
		<div class="product-img" @if ($product->image)style="background-image: url('{{$product->image}}');"@endif>
		</div>
	</div>
@elsecan('update', $product)
	@include('products.edit')
@else
	<div class="product" id="product-{{$product->id}}">
		<div class="product-name">
			{{$product->name}}<br>
			<span class="product-price">
				${{number_format($product->price, 2)}}
			</span>
		</div>
		<div class="product-img" @if ($product->image)style="background-image: url('{{$product->image}}');"@endif>
		</div>
	</div>
@endcan