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
				<i class="fa fa-th"></i> View Product Information
			</div>
			<div class="col-md-4 text-right">
				<a href="#" class="btn btn-dark btn-sm card_button"><i class="fa fa-th"></i> All Product</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="card-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Sl No </th>
					<th>Image </th>
					<th>Product Name </th>
					<th>Category Name </th>
					<th>Product Title </th>
					<th>Description </th>
					<th>Quantity </th>
					<th>Product Code </th>
					<th>Price </th>
					<th>Manage </th>
				</tr>
			</thead>
			<tbody>
				@forelse($all_products as $data)
				<tr class="table-warning">
					<td> {{$loop->index+1}} </td>
					<td>
						<img src="{{asset('upload/photos/main')}}/{{$data->product_image}}" alt="Not Found" width="80px">
					</td>
					<td>{{Str::limit($data->name,5)}}</td>
					<td>{{$data->relationcategory->category_name}}</td>
					{{-- <td>{{App\Category::find($data->category_id)->category_name}}</td> --}}
					<td>{{Str::limit($data->title,8)}}</td>
					<td>{{Str::limit($data->description,14)}}</td>
					<td>{{$data->quantity}}</td>
					<td>{{$data->code}}</td>
					<td>{{$data->price}}</td>
					<td>
						<a href="{{url('/product/edit')}}/{{$data->id}}"><i class="far fa-edit"></i></a>
						<a href="{{url('delete/product')}}/{{$data->id}}"><i class="fas fa-trash-alt"></i></a>
					</td>
				</tr>
				@empty
				<tr class="text-center bg-danger">
					<th colspan="10">No Data Available This Table</th>
				</tr>
				@endforelse
			</tbody>
		</table>
	</div>
</div>
</div>
</div>

@endsection