@extends('template.base')
@section('title') Reset Password @endsection
@section('content')
<div class="col-md-5 col-md-offset-3">
	<div class="panel panel-default">
		<div class="panel-heading">
			Reset Password
		</div>
		<div class="panel-body">
			<form method="POST" action="{{ route('password.request') }}">
				@csrf
               <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="name">Email</label>
                  <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required/>
                  @if ($errors->has('email'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('email') }}</strong>
	                </span>
	               @endif
               </div>
               <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="name">Password</label>
                  <input type="password" class="form-control" id="password" name="password" required/>
                   @if ($errors->has('password'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('password') }}</strong>
	                </span>
	               @endif
               </div>
               <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                  <label for="name">Confirm Password</label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required/>
                   @if ($errors->has('password_confirmation'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('password_confirmation') }}</strong>
	                </span>
	               @endif
               </div>
               <button type="submit" class="btn btn-primary btn-block"> {{ __('Reset Password') }}</button>
			</form>
		</div>
	</div>
</div>
@endsection