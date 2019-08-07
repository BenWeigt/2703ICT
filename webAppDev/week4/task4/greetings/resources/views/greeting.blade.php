@extends('layouts/master')

@section('title')
Greeting
@endsection

@section('body')
	<p> Hello {{$name}}. Next year, you will be {{$age + 1}} years old.</p>
	<hr>
@endsection