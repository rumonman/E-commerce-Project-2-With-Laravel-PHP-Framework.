 @extends('layout.admin')
@section('content')
<div class="col-lg-12 stretch-card">
	<div class="card">
		<div class="card-header">
			@if (session('restore'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{{ session('restore') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif
		@if (session('force'))
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				{{ session('force') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif
		<div class="row">
			<div class="col-md-8 card_header_text">
				<i class="fa fa-th"></i> Delete Category
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
				@forelse($delete_categorys as $dcategory)
				<tr class="table-warning">
					<td> {{$loop->index+1}} </td>
					<td>{{$dcategory->category_name}}</td>
					<td>{{($dcategory->manu_status ==1)? "YES":"NO"}}</td>
					<td>{{$dcategory->created_at->diffForHumans()}}</td>
					<td>
						
						<a href="{{url('delete/category/restore')}}/{{$dcategory->id}}"><i class="far fa-window-restore"></i></a>
						<a href="{{url('/delete/category/force')}}/{{$dcategory->id}}"><i class="fas fa-trash-alt"></i></a>
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