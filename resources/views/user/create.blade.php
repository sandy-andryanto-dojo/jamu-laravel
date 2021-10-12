@extends('template.base')
@section('title') Create User @endsection
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="col-md-6">
			<a href="{{ route('user.index') }}" class="btn btn-default">
				Back to List
			</a>
		</div>
		<div class="col-md-6">
			
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="panel-body">
		 {!! Form::open(array('route' => 'user.store','method'=>'POST','class'=>'form-horizontal','id'=>'FormSubmit')) !!}
		   <div class="form-group">
		      <label for="firstname" class="col-sm-2 control-label">Username</label>
		      <div class="col-sm-10">
		        <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" />
		        @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
                @endif
		      </div>
		   </div>
		    <div class="form-group">
		      <label for="firstname" class="col-sm-2 control-label">Email</label>
		      <div class="col-sm-10">
		        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" />
		         @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
		      </div>
		   </div>
		    <div class="form-group">
		      <label for="firstname" class="col-sm-2 control-label">Password</label>
		      <div class="col-sm-10">
		        <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" />
		         @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
		      </div>
		   </div>
		   <div class="form-group">
		      <div class="col-sm-offset-2 col-sm-10">
		         <button type="submit" class="btn btn-default">Save</button>
		      </div>
		   </div>
		{!! Form::close() !!}
	</div>
</div>
@endsection