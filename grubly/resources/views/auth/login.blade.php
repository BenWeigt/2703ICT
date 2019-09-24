@extends('layouts.app')
@section('content')
	<section class="login">
		<form method="POST" class="form" action="{{ route('login') }}">
			@csrf
			<div class="title">
				Login
			</div>
			<div class="type-corner">
				<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
			</div>
			<div class="grid">

				<div class="field">
					<input id="email" type="email" placeholder=" " class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
					<label for="email">Email</label>
					@error('email')
						<strong>{{ $message }}</strong>
					@enderror
				</div>

				<div class="field">
					<input id="password" type="password" placeholder=" " class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
					<label for="password">Password</label>
					@error('password')
						<strong>{{ $message }}</strong>
					@enderror
				</div>

				<button type="submit" class="btn btn-primary">{{ __('Login') }}</button>

				<div class="field" style="text-align: center; margin: 0;">
					@if (Route::has('password.request'))
						<a class="btn btn-link" style="font-size: small;" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
					@endif
				</div>
			</div>
		</form>
	</section>
@endsection

