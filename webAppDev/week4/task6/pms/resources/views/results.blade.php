@section('head')
	<!DOCTYPE html>
	<html>
	<head>
		<title>Associative array search results page</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="{{asset('css/wp.css')}}">
	</head>
	<body>
		<h2>Australian Prime Ministers</h2>
@endsection
	





	


	@section('results')
		<h3>Results</h3>
		@if (count($results))
			<table class="bordered">
				<thead>
					<tr><th>No.</th><th>Name</th><th>From</th><th>To</th><th>Duration</th><th>Party</th><th>State</th></tr>
				</thead>
				<tbody>
					@foreach ($results as $pm)
						<tr><td>{{$pm['index']}}</td><td>{{$pm['name']}}</td><td>{{$pm['from']}}</td><td>{{$pm['to']}}</td><td>{{$pm['duration']}}</td><td>{{$pm['party']}}</td><td>{{$pm['state']}}</td></tr>
					@endforeach
				</tbody>
			</table>
		@else
			<p>No results found.</p>
		@endif
	@endsection


	<p><a href="../public/">New search</a></p>

@section('head')
		<hr>
	</body>
	</html>
@endsection
