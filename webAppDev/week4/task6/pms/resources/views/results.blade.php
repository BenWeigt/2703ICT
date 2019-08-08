@extends('layouts/master')

@section('results')
	<h3>Search result for &quot;{{$search}}&quot;</h3>
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
	<p><a href="../public/">New search</a></p>
@endsection