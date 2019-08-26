@extends('layouts/master')

@section('content')
	@if (count($items))
		<ul>
		@foreach ($items as $item)
			<li><a href="/public/items/{{$item['Id']}}">{{$item['Name']}}</a></li>
		@endforeach
		</ul>
	@else
		<p>No items exist. <a href="/public/create">Click here to create one.</a></p>
	@endif
@endsection


{{-- <div class="row">
	<div class="col-sm-4 new-post">
	</div>
	<div id="posts" class="col-sm-8 posts">
	</div>
</div> --}}