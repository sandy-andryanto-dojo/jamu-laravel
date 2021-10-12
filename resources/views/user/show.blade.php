@extends('template.base')
@section('title') Show User @endsection
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
		<form class="form-horizontal">
		   <div class="form-group">
		      <label for="firstname" class="col-sm-2 control-label">Username</label>
		      <div class="col-sm-10">
		         <label class="control-label">
		         	<strong>:&nbsp{{ $user->username }}</strong>
		         </label>
		      </div>
		   </div>
		   <div class="form-group">
		      <label for="lastname" class="col-sm-2 control-label">Email</label>
		      <div class="col-sm-10">
		         <label class="control-label">
		         	<strong>:&nbsp{{ $user->email }}</strong>
		         </label>
		      </div>
		   </div>
		   <div class="form-group">
		      <label for="lastname" class="col-sm-2 control-label">Password</label>
		      <div class="col-sm-10">
		         <label class="control-label">
		         	<strong>:&nbsp********</strong>
		         </label>
		      </div>
		   </div>
		</form>
	</div>
</div>
@endsection