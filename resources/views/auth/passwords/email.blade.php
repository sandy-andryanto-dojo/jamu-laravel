@extends('template.base')
@section('title') Reset Password @endsection
@section('content')
<div class="col-md-5 col-md-offset-3">
	<div class="panel panel-default">
		<div class="panel-heading">
			Reset Password
		</div>
		<div class="panel-body">
			<form method="POST" action="{{ route('password.email') }}">
				@csrf
               <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="name">E-Mail Address</label>
                  <input type="email" class="form-control" id="email" name="email" required/>
                   @if ($errors->has('email'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('email') }}</strong>
	                </span>
	               @endif
               </div>
               <button type="submit" class="btn btn-primary btn-block">
               		{{ __('Send Password Reset Link') }}
               </button>
               <div class="text-center">
	               	<a class="btn btn-link" href="{{ route('login') }}">
		                Already registered ?
		            </a>
               </div>
			</form>
		</div>
	</div>
</div>
@endsection