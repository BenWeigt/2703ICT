<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Foreach loop example</title>
		<link rel="stylesheet" href="{{asset('css/wp.css'}}" type="text/css">
	</head>

	<body>
		<table class="bordered">
			<tr>
				<th>Name</th>
				<th>Value</th>
			</tr>
			@forelse ($get as $name => $value)
				<tr>
					<td>{{$name}}:</td>
					<td>{{$value}}</td>
				</tr>
			@empty
				<tr>
					<td colspan="2">No URL variables</td>
				</tr>
			@endforelse
		</table>
	</body>
</html>