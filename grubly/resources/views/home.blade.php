@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home</div>
                <div class="card-body">
                    @if (session('status'))
											<div class="alert alert-success" role="alert">
												{{ session('status') }}
											</div>
										@else
											@guest
												<a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
												<br>
												<a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
												<br>
												<a class="" style="display:inline-block; margin:5px 0 0 10px;" href="{{REL_DIR}}/product">Products</a>
											@else
												<a class="" href="{{REL_DIR}}/product">Products</a>
												<br>
												<a class="" href="{{REL_DIR}}/product/create">Create</a>
											@endguest
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
