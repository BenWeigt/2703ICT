@extends('templates/main')

@section('content')
	@if (count($items))
		<ul>
		@foreach ($items as $item)
			<li><a href="/webAppDev/week6/items/public/items/{{$item->id}}">{{$item->summary}}</a> - <a href="#" onclick="postRemove({{$item->id}})">❌</a></li>
		@endforeach
		</ul>
		<p><a href="/webAppDev/week6/items/public/create">Create New</a></p>
		<form id="delete_form" method="post" action="/webAppDev/week6/items/public/delete">
			{{csrf_field()}}
			<input id="delete_id" type="hidden" name="id">
		</form>
	@else
		<p>No items exist. <a href="/webAppDev/week6/items/public/create">Click here to create one.</a></p>
	@endif

	<script>
		function postRemove(id){
			document.getElementById('delete_id').value = id;
			document.getElementById('delete_form').submit();
		}
	</script>
@endsection