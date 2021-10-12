@extends('template.base')
@section('title') Create Product @endsection
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="col-md-6">
			<a href="{{ route('product.index') }}" class="btn btn-default">
				Back to List
			</a>
		</div>
		<div class="col-md-6">
			
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="panel-body">
		 {!! Form::open(array('route' => 'product.store','method'=>'POST','class'=>'form-horizontal','id'=>'FormSubmit','enctype'=>'multipart/form-data')) !!}
		   <div class="form-group">
		      <label for="firstname" class="col-sm-2 control-label">Code</label>
		      <div class="col-sm-10">
		        <input type="text" class="form-control" id="code" name="code" value='@php echo "P".rand(1000,1999)."".substr(time(), 0,3) @endphp' readonly="true" />
		      </div>
		   </div>
		   <div class="form-group">
		      <label for="firstname" class="col-sm-2 control-label">Name</label>
		      <div class="col-sm-10">
		        <input type="text" class="form-control" id="name" name="name" />
		      </div>
		   </div>
		   <div class="form-group">
		      <label for="firstname" class="col-sm-2 control-label">Price</label>
		      <div class="col-sm-10">
		        <input type="number" class="form-control" id="price" min="0" value="0" name="price" />
		      </div>
		   </div>
		   <div class="form-group">
		      <label for="firstname" class="col-sm-2 control-label">Expired</label>
		      <div class="col-sm-10">
		        <input type="date" class="form-control" id="expired" name="expired" />
		      </div>
		   </div>
		   <div class="form-group">
		      <label for="firstname" class="col-sm-2 control-label">Brand</label>
		      <div class="col-sm-10">
		        {!! Form::select('brand_id', $brand->pluck('name','id'), null, ['id'=>'brand_id','class'=>'form-control','required'=>'true']) !!}
		      </div>
		   </div>
		    <div class="form-group">
		      <label for="firstname" class="col-sm-2 control-label">Category</label>
		      <div class="col-sm-10">
		      	  @foreach($category as $c)
		           <label class="checkbox-inline">
				      <input type="checkbox" name="category[]" value="{{ $c->id }}"> {{ $c->name }}
				   </label>
				   @endforeach
		      </div>
		   </div>
		   <div class="form-group">
		      <label for="firstname" class="col-sm-2 control-label">Images</label>
		      <div class="col-sm-10">
		        <input type="file" class="form-control" id="images" name="file" />
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