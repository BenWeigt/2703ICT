@extends('templates/main')

@section('content')
	@if (!empty($item))
	<div id="display_item" style="max-width: 750px; margin: auto; position: relative;">
		<edit style="right: 42px;">🖉</edit><remove>❌</remove>
		<style>
			edit, remove {font-size: 28px; display: block; position: absolute; right: 0; top: 0; opacity: 0; transition: all 100ms ease; cursor: pointer;}
			#display_item:hover edit, #display_item:hover remove {opacity: 1}
		</style>
		<h2>{{$item->summary}}</h2>
		<p>{{$item->details}}</p>
		<a href="/webAppDev/week6/items/public/items">Back to all items</a>
	</div>

	<form id="update_form" method="post" action="/webAppDev/week6/items/public/update" style="max-width: 750px; margin: auto; display: none;">
		{{csrf_field()}}
		<input type="hidden" name="id" value="{{$item->id}}">
		<div class="form-group">
				<label for="new-post-name">Summary</label>
				<input type="text" name="summary" class="form-control" id="new-post-name" placeholder="{{$item->summary}}" value="{{$item->summary}}" required maxlength="80">
		</div>
		<div class="form-group">
				<label for="new-post-msg">Details</label>
				<textarea name="details" class="form-control" id="new-post-msg" placeholder="{{$item->details}}" value="" required>{{$item->details}}</textarea>
		</div>
		<button type="submit" class="btn btn-primary" style="display: block; margin: auto;">Update Item</button>
	</form>
	<form id="delete_form" method="post" action="/webAppDev/week6/items/public/delete">
		{{csrf_field()}}
		<input id="delete_id" type="hidden" name="id" value="{{$item->id}}">
	</form>

	<script>
		document.querySelector('edit').addEventListener('click', ()=>{
			document.getElementById('update_form').style.display = 'block';
			document.getElementById('display_item').style.display = 'none';
		});
		document.querySelector('remove').addEventListener('click', ()=>{
			document.getElementById('delete_form').submit();
		});
	</script>
	@else
		<p>Item could not be found. <a href="/webAppDev/week6/items/public/items">Click here for a list of all items.</a></p>
	@endif
@endsection