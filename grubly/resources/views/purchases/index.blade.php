@extends('layouts/app')

{{-- purchases.index --}}
@section('content')

	{{-- Restaurants see their own sales statistics, graphed --}}
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

	{{-- Purchase history, paginated --}}
	<section class="reciept-index">
		@restaurant
			{{-- Restaurant sees all purchases made to them --}}
			@foreach(($paginations = grubly\Restaurant::find(\Auth::user()->id)->purchases()->paginate(8)) as $purchase)
				@include('components.reciept', ['purchase', $purchase])
			@endforeach
		@else
			@admin
				{{-- Admin sees all history (for easier demo purposes) --}}
				@foreach(($paginations = grubly\Purchase::paginate(8)) as $purchase)
					@include('components.reciept', ['purchase', $purchase])
				@endforeach
			@else
				{{-- Customer sees their purchases --}}
				@foreach(($paginations = \Auth::user()->purchases()->paginate(8)) as $purchase)
					@include('components.reciept', ['purchase', $purchase])
				@endforeach
			@endadmin
		@endrestaurant
	</section>
	<div class="restaurant-products-pagination">
		{{$paginations}}
	</div>

	{{-- Script handles long reciepts, alowing a user to click a clipped reciept to expand it to full length --}}
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