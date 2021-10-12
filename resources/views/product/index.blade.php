@extends('template.base')
@section('title') List Product @endsection
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="col-md-6">
			<a href="{{ route('product.create') }}" class="btn btn-default">
				Create New
			</a>
			<a href="{{ route('product.index') }}" class="btn btn-default">
				Refresh
			</a>
		</div>
		<div class="col-md-6">
			<form action="{{ route('product.index') }}">
				<div class="input-group">
	               <input type="text" class="form-control" name="search"  value="{{ \Input::get('search') }}"  required/>
	               <span class="input-group-btn">
	                  <button class="btn btn-default" type="submit">
	                    Search
	                  </button>
	               </span>
	            </div>
			</form>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="panel-body">
		@include('template.alert')
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Created At</th>
						<th>Code</th>
						<th>Name</th>
						<th>Brand</th>
						<th>Price</th>
						<th>Images</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($result)==0)
					<tr>
						<td colspan="8" class="text-center">No Data</td>
					</tr>
					@else
						@php   
							$page = \Input::get('page') ? \Input::get('page') : 1;
							$num = ($page * 10) - 9;
						@endphp
						@foreach($result as $row)
							<tr>
								<td>{{ $num++ }}</td>
								<td>{{ $row->created_at }}</td>
								<td>{{ $row->code }}</td>
								<td>{{ $row->name }}</td>
								<td>{{ $row->brand->name }}</td>
								<td>{{ $row->price }}</td>
								<td>
									@if($row->photos)
										<img src="/uploads/{{ $row->photos }}" class="thumbnail" width="100" alt="{{ $row->name }}">
									@else
										<label>No Images</label>
									@endif
								</td>
								<td class="text-center">
				                    {!! Form::open(array(
				                            'method' => 'DELETE',
				                            'route' => ['product.destroy', $row->id],
				                            'onsubmit' => "return confirm('Are you sure you want to delete?')",
				                        )) 
				                    !!}
				                    <a class="btn btn-default btn-sm" href="{{ route('product.edit',['id'=>$row->id]) }}">
										Edit
									</a>
									<a class="btn btn-default btn-sm" href="{{ route('product.show',['id'=>$row->id]) }}">
										Show
									</a>
				                    {!! Form::submit('Delete',["class"=>"btn btn-default btn-sm"]) !!}
				                    {!! Form::close() !!}
								</td>
							</tr>
						@endforeach
					@endif
				</tbody>
			</table>
			{{ $result->links() }}
		</div>
	</div>
</div>
@endsection