@extends('layouts/app')
@section('content')
	<section style="padding: 50px; display: flex; justify-content: center;">
		@include('components.reciept', ['purchase', $purchase])
	<section>
@endsection