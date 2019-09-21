@extends('layouts/app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Edit</div>
				<div class="card-body">
					<form method="POST" action= '{{url("product/$product->id")}}'>
						{{csrf_field()}}
						{{ method_field('PUT') }}
						<p>
							<label>Name</label><input type="text" name="name" value="{{old('name') ? old('name') : $product->name}}">
							<span style="font-weight: bold; font-style: italic; color: red;">{{$errors->first('name')}}</span>
						</p>
						<p>
							<label>Price</label><input type="text" name="price" value="{{old('price') ? old('price') : $product->price}}">
							<span style="font-weight: bold; font-style: italic; color: red;">{{$errors->first('price')}}</span>
						</p>
						<p>
							<select name="restaurant">
							@foreach ($restaurants as $restaurant)
								@if(old('restaurant') && old('restaurant') == $restaurant->id || !old('restaurant') && $restaurant->id == $product->restaurant_id)
									<option value="{{$restaurant->id}}" selected="selected">{{$restaurant->name}}</option>
								@else
									<option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
								@endif
							@endforeach
							</select>
							<span style="font-weight: bold; font-style: italic; color: red;">{{$errors->first('restaurant')}}</span>
						</p>
						<input type="submit" value="Update">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection