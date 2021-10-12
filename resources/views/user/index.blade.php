@extends('template.base')
@section('title') List User @endsection
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="col-md-6">
			<a href="{{ route('user.create') }}" class="btn btn-default">
				Create New
			</a>
			<a href="{{ route('user.index') }}" class="btn btn-default">
				Refresh
			</a>
		</div>
		<div class="col-md-6">
			<form action="{{ route('user.index') }}">
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
						<th>Username</th>
						<th>Email</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($result)==0)
					<tr>
						<td colspan="5" class="text-center">No Data</td>
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
								<td>{{ $row->username }}</td>
								<td>{{ $row->email }}</td>
								<td class="text-center">
				                    {!! Form::open(array(
				                            'method' => 'DELETE',
				                            'route' => ['user.destroy', $row->id],
				                            'onsubmit' => "return confirm('Are you sure you want to delete?')",
				                        )) 
				                    !!}
				                    <a class="btn btn-default btn-sm" href="{{ route('user.edit',['id'=>$row->id]) }}">
										Edit
									</a>
									<a class="btn btn-default btn-sm" href="{{ route('user.show',['id'=>$row->id]) }}">
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