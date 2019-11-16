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
				<i class="fa fa-th"></i> View Category
			</div>
			<div class="col-md-4 text-right">
				<a href="#" class="btn btn-dark btn-sm card_button"><i class="fa fa-th"></i> All Category</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="card-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Sl No </th>
					<th>Category Name </th>
					<th>Manu Status </th>
					<th>Created At </th>
					<th>Manage </th>
				</tr>
			</thead>
			<tbody>
				@forelse($all_category as $data)
				<tr class="table-warning">
					<td> {{$loop->index+1}} </td>
					<td>{{$data->category_name}}</td>
					<td>{{($data->manu_status ==1)? "YES":"NO"}}</td>
					<td>{{$data->created_at->diffForHumans()}}</td>
					<td>
						<a href="{{url('add/category/change')}}/{{$data->id}}"><i class="fab fa-stack-exchange"></i></a>
						<a href="{{url('add/category/edit/form')}}/{{$data->id}}"><i class="far fa-edit"></i></a>
						<a href="{{url('/category/soft/delete')}}/{{$data->id}}"><i class="fas fa-trash-alt"></i></a>
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