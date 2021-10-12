@extends('template.base')
@section('title') Show Product @endsection
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
		<form class="form-horizontal">
		   <div class="form-group">
		      <label for="firstname" class="col-sm-2 control-label">Code</label>
		      <div class="col-sm-10">
		         <label class="control-label">
		         	<strong>:&nbsp{{ $product->code }}</strong>
		         </label>
		      </div>
		   </div>
		   <div class="form-group">
		      <label for="firstname" class="col-sm-2 control-label">Name</label>
		      <div class="col-sm-10">
		         <label class="control-label">
		         	<strong>:&nbsp{{ $product->name }}</strong>
		         </label>
		      </div>
		   </div>
		   <div class="form-group">
		      <label for="firstname" class="col-sm-2 control-label">Price</label>
		      <div class="col-sm-10">
		         <label class="control-label">
		         	<strong>:&nbsp{{ $product->price }}</strong>
		         </label>
		      </div>
		   </div>
		   <div class="form-group">
		      <label for="firstname" class="col-sm-2 control-label">Expired</label>
		      <div class="col-sm-10">
		         <label class="control-label">
		         	<strong>:&nbsp{{ $product->expired }}</strong>
		         </label>
		      </div>
		   </div>
		   <div class="form-group">
		      <label for="firstname" class="col-sm-2 control-label">Brand</label>
		      <div class="col-sm-10">
		         <label class="control-label">
		         	<strong>:&nbsp{{ $product->brand->name }}</strong>
		         </label>
		      </div>
		   </div>
		   <div class="form-group">
		      <label for="firstname" class="col-sm-2 control-label">Category</label>
		      <div class="col-sm-10">
		         <label class="control-label">
		         	 <strong>
		         	 	:&nbsp
		         	 	@if(count($product->categories) > 0)
		         	 		@foreach($product->categories as $c)
		         	 			{{ $c->name }} ,
		         	 		@endforeach
		         	 	@else
		         	 		No Data
		         	 	@endif
		         	 </strong>
		         </label>
		      </div>
		   </div>
		   <div class="form-group">
		      <label for="firstname" class="col-sm-2 control-label">Images</label>
		      <div class="col-sm-10">
		         <label class="control-label">
		         	 @if($product->photos)
						<img src="/uploads/{{ $product->photos }}" class="thumbnail" width="100" alt="{{ $product->name }}">		         	 	
		         	 @else
		         	 	No Images
		         	 @endif
		         </label>
		      </div>
		   </div>
		</form>
	</div>
</div>
@endsection