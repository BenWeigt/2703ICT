@extends('layouts/app')
@section('content')
	<section class="reciept-index">
		@foreach (\Auth::user()->purchases as $purchase)
			@include('components.reciept', ['purchase', $purchase])
		@endforeach
	</section>
	<script>
		(()=>{
			document.addEventListener('DOMContentLoaded', ()=>{
				for (const reciept of document.querySelectorAll('.reciept')) {
					if (reciept.querySelectorAll('.cart-product').length > 3)
						reciept.classList.add('clipped');
					reciept.addEventListener('click', ()=>{
						for (const otherReciept of document.querySelectorAll('.reciept')) {
							if (otherReciept !== reciept)
								otherReciept.classList.remove('expanded');
						}
						reciept.classList.toggle('expanded');
					});
				}
			});
		})();

	</script>
@endsection