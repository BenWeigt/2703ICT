@extends('layouts.app')

{{-- A visual rework of the standard auth.register --}}
@section('content')
<section class="register">
	<form method="POST" class="form" action="{{ route('register') }}">
		@csrf
		<div class="title">
			Create Account
		</div>
		<div class="type-corner">
			<input type="checkbox" id="type" name="type" value="restaurant">
		</div>
		<div class="grid">
			<div class="field n">
				<input id="name" type="text" placeholder=" " @error('name') is-invalid @enderror name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
				<label for="name">{{ __('Name') }}</label>
				@error('name')
					<strong>{{ $message }}</strong>
				@enderror
			</div>

			<div class="field a">
				<input id="address" type="text" placeholder=" " @error('address') is-invalid @enderror name="address" value="{{ old('address') }}" >
				<label for="address">Address</label>
				@error('address')
					<strong>{{ $message }}</strong>
				@enderror
			</div>
			<div class="field s">
				<input id="suburb" type="text" placeholder=" " @error('suburb') is-invalid @enderror name="suburb" value="{{ old('suburb') }}" >
				<label for="suburb">Suburb</label>
				@error('suburb')
					<strong>{{ $message }}</strong>
				@enderror
			</div>
			<div class="field po">
				<input id="postcode" type="text" placeholder=" " @error('postcode') is-invalid @enderror name="postcode" value="{{ old('postcode') }}" >
				<label for="postcode">Postcode</label>
				@error('postcode')
					<strong>{{ $message }}</strong>
				@enderror
			</div>
			<div class="field st">
				<input id="state" type="text" placeholder=" " @error('state') is-invalid @enderror name="state" value="{{ old('state') }}" >
				<label for="state">State</label>
				@error('state')
					<strong>{{ $message }}</strong>
				@enderror
			</div>

			<div class="field e">
				<input id="email" type="email" placeholder=" " @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required autocomplete="email">
				<label for="email">{{ __('E-Mail Address') }}</label>
				@error('email')
					<strong>{{ $message }}</strong>
				@enderror
			</div>
			<div class="field p">
				<input id="password" type="password" placeholder=" " @error('password') is-invalid @enderror name="password" required autocomplete="new-password">
				<label for="password">{{ __('Password') }}</label>
				@error('password')
					<strong>{{ $message }}</strong>
				@enderror
			</div>
			<div class="field pc">
				<input id="password-confirm" type="password" placeholder=" " name="password_confirmation" required autocomplete="new-password">
				<label for="password-confirm">{{ __('Confirm Password') }}</label>
			</div>
			<button class="sub" type="submit">
				{{ __('Register') }}
			</button>
		</div>
	</form>
</section>
@endsection