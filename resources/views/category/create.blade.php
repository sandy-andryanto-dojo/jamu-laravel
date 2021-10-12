@extends('template.base')
@section('title') Create Category @endsection
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="col-md-6">
			<a href="{{ route('category.index') }}" class="btn btn-default">
				Back to List
			</a>
		</div>
		<div class="col-md-6">
			
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="panel-body">
		 {!! Form::open(array('route' => 'category.store','method'=>'POST','class'=>'form-horizontal','id'=>'FormSubmit')) !!}
		   <div class="form-group">
		      <label for="firstname" class="col-sm-2 control-label">Name</label>
		      <div class="col-sm-10">
		        <input type="text" class="form-control" id="name" name="name" />
		      </div>
		   </div>
		   <div class="form-group">
		      <label for="lastname" class="col-sm-2 control-label">Description</label>
		      <div class="col-sm-10">
		         <textarea name="description" id="description" class="form-control" rows="5"></textarea>
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