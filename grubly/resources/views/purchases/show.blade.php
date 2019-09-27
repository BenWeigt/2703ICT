@extends('layouts/app')

{{-- purchases.show --}}
@section('content')
	<section style="padding: 50px; display: flex; justify-content: center;">

		{{-- Purchase display is abstracted out into components --}}
		@include('components.reciept', ['purchase', $purchase])
	<section>
@endsection