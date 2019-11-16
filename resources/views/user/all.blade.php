@extends('layout.admin')
@section('content')
<div class="col-lg-12 stretch-card">
	<div class="card">
		<div class="card-header">
			@if (session('delete'))
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				{{ session('delete') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif
		<div class="row">
			<div class="col-md-8 card_header_text">
				<i class="fa fa-th"></i> All User Information
			</div>
			<div class="col-md-4 text-right">
				<a href="#" class="btn btn-dark btn-sm card_button"><i class="fa fa-th"></i> All User</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="card-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Sl No </th>
					<th>First Name </th>
					<th>Last Name </th>
					<th>Email </th>
					<th>Registration Times </th>
					<th>Manage </th>
				</tr>
			</thead>
			<tbody>
				@forelse($users as $data)
				<tr class="table-success">
					<td> {{$loop->index+1}} </td>
					<td>{{$data->first_name}}</td>
					<td>{{$data->last_name}}</td>
					<td>{{$data->email}}</td>
					<td>{{$data->created_at->diffForHumans()}}</td>
				
					<td>
                         <a href="{{url('/all/user/edit')}}/{{$data->id}}"><i class="far fa-edit"></i></a>
                       
						<a href="{{url('/all/user/soft/delete')}}/{{$data->id}}"><i class="fas fa-trash-alt"></i></a>
					</td>
				</tr>
				@empty
				<tr class="text-center bg-danger">
					<th colspan="9">No Data Available This Table</th>
				</tr>
				@endforelse
			</tbody>
		</table>
	</div>
</div>
</div>
</div>
@endsection