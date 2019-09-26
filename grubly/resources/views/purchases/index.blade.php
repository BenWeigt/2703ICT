@extends('layouts/app')
@section('content')

	@restaurant
		
		Store total: {{($report = grubly\Purchase::getSalesReport())['running']}}<br>
		This week: ${{array_shift($report['weekly'])}} <br>
		1 week ago: ${{array_shift($report['weekly'])}} <br>
		@foreach ($report['weekly'] as $total)
			{{$loop->index + 2}} weeks ago: ${{$total}}<br>
		@endforeach

	@endrestaurant
	<section class="reciept-index">
		@restaurant
			{{-- Restaurant sees all purchases made to them --}}
			@foreach (grubly\Restaurant::find(\Auth::user()->id)->purchases as $purchase)
				@include('components.reciept', ['purchase', $purchase])
			@endforeach
		@else
			@admin
				{{-- Admin sees all history (for easier demo purposes) --}}
				@foreach (grubly\Purchase::all() as $purchase)
					@include('components.reciept', ['purchase', $purchase])
				@endforeach
			@else
				{{-- Customer sees their purchases --}}
				@foreach (\Auth::user()->purchases as $purchase)
					@include('components.reciept', ['purchase', $purchase])
				@endforeach
			@endadmin
		@endrestaurant
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