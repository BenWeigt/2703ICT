@extends('templates/main')

@section('content')
	@if (count($items))
		<ul>
		@foreach ($items as $item)
			<li><a href="/webAppDev/week6/items/public/items/{{$item->id}}">{{$item->summary}}</a></li>
		@endforeach
		</ul>
	@else
		<p>No items exist. <a href="/webAppDev/week6/items/public/create">Click here to create one.</a></p>
	@endif
@endsection


{{-- <div class="row">
	<div class="col-sm-4 new-post">
	</div>
	<div id="posts" class="col-sm-8 posts">
	</div>
</div> --}}