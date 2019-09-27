@extends('layouts/app')
@section('content')

	@restaurant
		<div class="sales-graph-total">Lifetime Sales Total: ${{($report = grubly\Purchase::getSalesReport())['running']}}</div>
		<div class="sales-graph">
		@foreach ($report['weekly'] as $total)
			<div class="sales-graph-bar" style="height: {{$total/$report['max']*100}}%">
				<div class="sales-graph-bar-value">
					${{number_format($total, 2)}}
				</div>
				<div class="sales-graph-bar-label">
					{{$loop->index==0 ? 'This Week' : ($loop->index==1 ? 'Last Week' : $loop->index.' Weeks Ago')}}
				</div>
			</div>
		@endforeach
		</div>

	@endrestaurant
	<section class="reciept-index">
		@restaurant
			{{-- Restaurant sees all purchases made to them --}}
			@foreach (grubly\Restaurant::find(\Auth::user()->id)->purchases as $purchase)
				@include('components.reciept', ['purchase', $purchase])
			@endforeach


			@foreach(($paginations = grubly\Restaurant::find(\Auth::user()->id)->purchases()->paginate(1)) as $purchase)
				@include('components.reciept', ['purchase', $purchase])
			@endforeach
		@else
			@admin
				{{-- Admin sees all history (for easier demo purposes) --}}
				@foreach (grubly\Purchase::all() as $purchase)
					@include('components.reciept', ['purchase', $purchase])
				@endforeach

				@foreach(($paginations = grubly\Purchase::all()->paginate(1)) as $purchase)
					@include('components.reciept', ['purchase', $purchase])
				@endforeach
			@else
				{{-- Customer sees their purchases --}}
				@foreach (\Auth::user()->purchases as $purchase)
					@include('components.reciept', ['purchase', $purchase])
				@endforeach

				@foreach(($paginations = \Auth::user()->purchases()->paginate(1)) as $purchase)
					@include('components.reciept', ['purchase', $purchase])
				@endforeach
			@endadmin
		@endrestaurant
	</section>
	<div class="restaurant-products-pagination">
		{{$paginations}}
	</div>
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