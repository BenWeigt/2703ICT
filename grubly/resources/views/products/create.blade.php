@extends('layouts/app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Create</div>
				<div class="card-body">
					@if (count($errors) > 0)
					<div class="alert">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					<form method="POST" action='{{url("product")}}'>
						{{csrf_field()}}
						<p><label>Name: </label><input type="text" name="name" value="{{old('name')}}"></p>
						<p><label>Price: </label><input type="text" name="price" value="{{old('price')}}"></p>
						<p><select name="manufacturer">
						@foreach ($manufacturers as $manufacturer)
							@if(old('manufacturer') && $manufacturer->id == old('manufacturer'))
								<option value="{{$manufacturer->id}}" selected="selected">{{$manufacturer->name}}</option>
							@else
								<option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
							@endif
						@endforeach
						</select></p>
						<input type="submit" value="Create">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>	
@endsection