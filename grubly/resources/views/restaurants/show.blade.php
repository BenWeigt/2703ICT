@extends('layouts/app')

@section('content')
	<pre>
		@can('create', grubly\Restaurant::class)
			Can
		@else
			Cant
		@endcan

		{{$restaurant->name}}
		{{$restaurant->manager->address}}
	</pre>
@endsection