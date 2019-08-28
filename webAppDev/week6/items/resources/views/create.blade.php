@extends('templates/main')

@section('content')
	<form method="post" style="max-width: 750px; margin: auto;">
		{{csrf_field()}}
		<div class="form-group">
				<label for="new-post-name">Summary</label>
				<input type="text" name="summary" class="form-control" id="new-post-name" placeholder="Summary" required maxlength="80">
		</div>
		<div class="form-group">
				<label for="new-post-msg">Details</label>
				<textarea name="details" class="form-control" id="new-post-msg" placeholder="Details" required></textarea>
		</div>
		<button type="submit" class="btn btn-primary" style="display: block; margin: auto;">Create Item</button>
	</form>
@endsection