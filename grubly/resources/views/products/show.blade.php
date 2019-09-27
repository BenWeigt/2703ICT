{{-- products.show --}}
{{-- This view is never used directly, rather included as part of another --}}

{{-- If the user can add the product to their cart, render with cart bindings --}}
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

{{-- Else if the user can update the product, render products.edit instead --}}
@elsecan('update', $product)
	@include('products.edit')

{{-- Else render without interactions --}}
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