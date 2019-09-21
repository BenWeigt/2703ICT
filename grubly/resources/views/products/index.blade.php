@extends('layouts/app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Index</div>
				<div class="card-body">
					@foreach ($products as $product)
						<div class="product" data-product-id="{{$product->id}}">
							<a href="product/{{$product->id}}"><li>{{$product->name}}</li></a>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection