@extends('template.base')
@section('title') Login @endsection
@section('content')
<div class="col-md-5 col-md-offset-3">
	<div class="panel panel-default">
		<div class="panel-heading">
			Please Sign In
		</div>
		<div class="panel-body">
			<form method="POST" action="{{ route('login') }}">
				@csrf
				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="name">Username or Email</label>
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
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
               <button type="submit" class="btn btn-primary btn-block">Sign In</button>
               <div class="text-center">
	               	<a class="btn btn-link" href="{{ route('password.request') }}">
		                {{ __('Forgot Your Password?') }}
		            </a>
               </div>
			</form>
		</div>
	</div>
</div>
@endsection