@extends('template.base')
@section('title') Register @endsection
@section('content')
<div class="col-md-5 col-md-offset-3">
	<div class="panel panel-default">
		<div class="panel-heading">
			Please Sign Up
		</div>
		<div class="panel-body">
			<form method="POST" action="{{ route('register') }}">
				@csrf
				<div class="form-group{{ $errors->has('register') ? ' has-error' : '' }}">
                  <label for="name">Username</label>
                  <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required/>
                  @if ($errors->has('username'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('username') }}</strong>
	                </span>
	               @endif
               </div>
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
               <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
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