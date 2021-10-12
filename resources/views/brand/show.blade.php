@extends('template.base')
@section('title') Show Brand @endsection
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="col-md-6">
			<a href="{{ route('brand.index') }}" class="btn btn-default">
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
		      <label for="firstname" class="col-sm-2 control-label">Name</label>
		      <div class="col-sm-10">
		         <label class="control-label">
		         	<strong>:&nbsp{{ $brand->name }}</strong>
		         </label>
		      </div>
		   </div>
		   <div class="form-group">
		      <label for="lastname" class="col-sm-2 control-label">Description</label>
		      <div class="col-sm-10">
		         <label class="control-label">
		         	<strong>:&nbsp{{ $brand->description }}</strong>
		         </label>
		      </div>
		   </div>
		</form>
	</div>
</div>
@endsection