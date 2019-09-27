{{-- Standard master design for Grubly --}}
<!DOCTYPE html>
<html>
	<head>
		<link href="{{asset('css/grubly.css')}}" rel="stylesheet">
		<script src="{{asset('js/grubly.js')}}"></script>

		{{-- Routes and csrf token for grubly.js --}}
		<script>
			window._routes = {
				addToCart: '{{route('addToCart')}}',
				removeFromCart: '{{route('removeFromCart')}}',
				clearCart: '{{route('clearCart')}}',
				productsCreate: '{{route('products.create')}}',
				products: '{{url('products')}}'
			};
			window._csrfToken = '{{csrf_token()}}';
		</script>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Grubly</title>
	</head>
	<body>
		<nav>

			{{-- Logo and home nav --}}
			<a id="nav-title" href="{{route('home')}}">
				<svg id="nav-title-logo" xmlns="http://www.w3.org/2000/svg" fill="#fff" version="1.1" viewBox="0 0 90 30">
					<path d="M16,1h-2C6.832,1,1,6.832,1,14c0,0.552,0.447,1,1,1h26c0.553,0,1-0.448,1-1C29,6.832,23.168,1,16,1z M3.045,13  C3.552,7.401,8.271,3,14,3h2c5.729,0,10.448,4.401,10.955,10H3.045z"/>
					<path d="M28,21h-4c-0.217,0-0.427,0.07-0.6,0.2L20,23.75l-3.4-2.55C16.427,21.07,16.217,21,16,21H2c-0.553,0-1,0.447-1,1v2  c0,2.757,2.243,5,5,5h18c2.757,0,5-2.243,5-5v-2C29,21.447,28.553,21,28,21z M27,24c0,1.654-1.346,3-3,3H6c-1.654,0-3-1.346-3-3v-1  h12.667l3.733,2.8c0.355,0.268,0.844,0.268,1.199,0l3.733-2.8H27V24z"/>
					<path d="M28,17H2c-0.553,0-1,0.447-1,1s0.447,1,1,1h26c0.553,0,1-0.447,1-1S28.553,17,28,17z"/>
					<path d="M10,7C9.447,7,9,7.448,9,8v1c0,0.552,0.447,1,1,1s1-0.448,1-1V8C11,7.448,10.553,7,10,7z"/>
					<path d="M15,7c-0.553,0-1,0.448-1,1v1c0,0.552,0.447,1,1,1s1-0.448,1-1V8C16,7.448,15.553,7,15,7z"/>
					<path d="M20,7c-0.553,0-1,0.448-1,1v1c0,0.552,0.447,1,1,1s1-0.448,1-1V8C21,7.448,20.553,7,20,7z"/>
					<text x="30" y="22" style="font: 20px 'Roboto', sans-serif">Grubly</text>
				</svg>
			</a>

			{{-- Guests can login and register --}}
			@guest
				<a class="nav-auth" href="{{route('login')}}">
					Login
				</a>
				<a class="nav-auth" href="{{route('register')}}">
					Register
				</a>
			@else

				{{-- Authed users can view their history (sales and statistics for restaurants, purchase history for customers, all purchases for administrators) --}}
				<div style="display: flex; justify-content: center;	flex-direction: column; color: #8BC34A; font-size: 20px;">Hi, {{ Auth::user()->name }}!</div>
				<a class="nav-auth" href="{{route('purchases.index')}}">
					History
				</a>

				{{-- Authed users can logout --}}
				<a class="nav-auth" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
					Logout
					<form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
          	@csrf
        	</form>
				</a>
			@endauth

			{{-- Include cart --}}
			@include('components.cart')
		</nav>
    @yield('content')
	</body>
</html>
