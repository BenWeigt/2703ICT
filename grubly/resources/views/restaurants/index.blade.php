@extends('layouts/app')

@section('content')

					@foreach ($restaurants as $restaurant)
						<div class="restaurant">
							<a href="restaurant/{{$restaurant->id}}"><li>{{$restaurant->name}}</li></a>
						</div>
					@endforeach

@endsection