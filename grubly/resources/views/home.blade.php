@extends('layouts.app')

@section('content')
<pre>
	@auth
		{{ var_dump(\Auth::user()->type) }}
		@if (\Auth::user()->type == 'manager')
			{{ var_dump(\Auth::user()->manages->name) }}
			{{ var_dump(\Auth::user()->manages->verified) }}
		@endif
	@endauth
</pre>
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
											
											
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
