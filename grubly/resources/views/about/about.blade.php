@extends('layouts/app')

{{-- documentation --}}
@section('content')

	<h2>Documentation</h2>
	<p>ER Diagram Via embed:</p>
	<iframe width="560" height="315" src='https://dbdiagram.io/embed/5d8e1e41ff5115114db4b1ab'> </iframe>
	
	<h2>Notes about Grubly</h2>
	<p>
		<a href="https://github.com/BenWeigt/2703ICT">Assignment GitHub Link</a><br>
		All features outlined in the assessment criteria were fully implemented. In many cases, these
		features have been expanded on in some degree to improve their useability and present a more
		integrated and seamless experience. In these cases, attention was paid to preserving sufficient 
		demonstration of the laravel frameworks mechanisms as outlined in the course work, using a mixture 
		of JS async fetch, dom manipulation and CSS techniques to blend together resources in a more
		dynamic fashion.
	</p>
	<p>
		Aside from meeting all the requirements, Grubly contains a couple of interesting additional 
		features; the most immediately obvious being how it handles maintaining the cart's render.
		Products can be added to the cart without causing a navigation. Because the cart is integrated 
		into the navigation, we need to maintain it's state dynamically - however we also don't want
		to lean on client side logic to maintain that state, as the assessment implies an emphasis on
		demonstrating that logic in laravel. So Grubly uses the JS fetch api to submit the cart changes
		to the laravel CRUD endpoints, receiving the new cart HTML back in the response. This is then
		parsed and swapped in place. Iframes could have also been used for this purpose, but would 
		have been heavier, slower, and boring. Portals were very briefly looked at, but are not really
		intended to cater to these sorts of interactions, and are still gated behind experimental flags.
		This technique is additionally extended to product creation and modification, where it allows
		the integrated editing of multiple products on the same page without navigation, but still
		permits the demonstration of appropriate laravel sanitisation and error reporting.
	</p>
	<p>
		The other noteworthy addition is the use of laravels policies in support of auth middleware.
		These policies have been created for each model, and extended as authorisation to their controllers.
		This allows for defining permissions in a more symmetrical and scruitinisable way, while also
		enabling more succinct authorisation branched logic through the use of &commat;can and the User
		method can(). &commat;can in particular has been expanded on even further through creation
		of the custom blade directives &commat;cart, &commat;customer, &commat;restaurant and &commat;admin,
		which act similarly to &commat;auth.
	</p>
@endsection