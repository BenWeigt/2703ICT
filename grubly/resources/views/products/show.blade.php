@extends('layouts/app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Show</div>
				<div class="card-body">
					<h1>{{$product->name}}</h1>
					<p>{{$product->price}}</p>
					<p>{{$product->restaurant->name}}</p>
					@auth
						<p>
							<a href=' {{url("product/$product->id/edit")}}'>Edit</a>
						</p>
						<p>
							<form method="POST" action= '{{url("product/$product->id")}}'>
								{{csrf_field()}}
								{{ method_field('DELETE') }}
								<input type="submit" value="Delete">
							</form>
						</p>
					@endauth
				</div>
			</div>
		</div>
	</div>
</div>
@endsection