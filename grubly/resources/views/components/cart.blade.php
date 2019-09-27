{{-- components.cart --}}
{{-- 
	components.cart can be rendered via @include as part of constructing another view, but can
	also be accessed directly via a defined route through the products controller. In this case, 
	it will be being fetched asynchronously via client js, and the html used to swap out the 
	clients previous cart render without reloading the surrounding page.
--}}

{{-- Only render if the cart is alowed --}}
@cart
	<div id="nav-cart">
		<svg id="nav-cart-icon" xmlns="http://www.w3.org/2000/svg" fill="#8BC34A" viewBox="0 0 40 40" x="0px" y="0px">
			<path d="M20,4A16,16,0,1,0,36,20,16.019,16.019,0,0,0,20,4Zm0,30A14,14,0,1,1,34,20,14.015,14.015,0,0,1,20,34Z"/>
			<path d="M27.012,12.873H24.266v-2.78a1,1,0,0,0-.293-.708l-.8-.8a1,1,0,0,0-.707-.292H17.538a1,1,0,0,0-.707.292l-.8.8a1,1,0,0,0-.293.708v2.78H12.988a1,1,0,0,0-1,1V29.636a1,1,0,0,0,1,1H27.012a1,1,0,0,0,1-1V13.873A1,1,0,0,0,27.012,12.873Zm-9.278-2.365.218-.218h4.1l.218.218v2.365H17.734Z"/>
		</svg>

		{{-- Number of cart items shown in nav --}}
		<div id="nav-cart-total">
			{{grubly\Product::totalInCart()}}
		</div>
	</div>

	{{-- Cart side bar --}}
	<div id="cart-wrapper" style="display: none;">
		<div id="cart">
			<div id="cart-title">
				Current Order
				<div id="cart-close">
					🗙
				</div>
			</div>

			{{-- All products in cart --}}
			@foreach (grubly\Product::allInCart() as $product)
				<div class="cart-product">
					@if($product->image)
						<img class="product-image" src="{{$product->image}}">
					@endif
					<div class="product-name">
						{{$product->name}}
					</div>
					<div class="product-price">

						{{-- Increment / decrement product in cart --}}
						<div class="decrement" onclick="window.cart.removeProduct({{$product->id}})">-</div>
						{{$product->inCart}}
						<div class="increment" onclick="window.cart.addProduct({{$product->id}})">+</div>
						<div style="margin-left: auto; padding-top: 17px;">
							${{number_format($product->price * $product->inCart, 2)}}
						</div>
					</div>
				</div>
			@endforeach

			{{-- Cart total price --}}
			<div id="cart-total">
				${{number_format(grubly\Product::allInCart()->sum('price'), 2)}}
			</div>

			{{-- Clear cart --}}
			<div id="cart-clear">
				Clear Cart
			</div>

			{{-- Confirm cart and purchase --}}
			<form method="POST" class="form" action="{{route('purchases.store')}}">
				@csrf
				<div id="purchase" onclick="this.parentNode.submit();">
					Confirm
				</div>
			</form>
		</div>
	</div>

	{{--
		Script binds cart interactions. On re-render injection, this script will not automatically 
		run, so it is regexed out via /<script>([\s\S]*)<\/script>/ and evaled.
	--}}
	<script>
		(()=>{
			// Load cart bindings
			if (document.readyState === 'loading')
				document.addEventListener('DOMContentLoaded', bindCartInteractions);
			else
				bindCartInteractions();

			function bindCartInteractions(){
				// Show cart on icon click
				const nav = document.getElementById('nav-cart');
				nav.addEventListener('click', evt=>{
					wrapper.classList.add('active');
				});
				// Hide cart on page overlay click
				const wrapper = document.getElementById('cart-wrapper');
				wrapper.addEventListener('click', evt=>{
					if (evt.target === wrapper)
						wrapper.classList.remove('active');
				});
				// Hide cart on page close click
				const close = document.getElementById('cart-close');
				close.addEventListener('click', evt=>{
					wrapper.classList.remove('active');
				});
				// Show cart on nav button click
				const clear = document.getElementById('cart-clear');
				clear.addEventListener('click', evt=>{
					wrapper.classList.remove('active');
					window.cart.clear();
				});
			}
		})();
	</script>
@endcart