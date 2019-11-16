@extends('layout.admin')
@section('content')
<div class="col-lg-12 stretch-card " >
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
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					{{ session('force') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
			@endif
			<div class="row">
			<div class="col-md-8 card_header_text">
				<i class="fa fa-th"></i> Delete Future Products
			</div>
			<div class="col-md-4 text-right">
				<a href="#" class="btn btn-dark btn-sm card_button"><i class="fa fa-th"></i> Delete Product</a>
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
					<th>Product Title </th>
					<th>Product Description </th>
					<th>Product Code </th>
					<th>Manage </th>
				</tr>
			</thead>
			<tbody>
				@forelse($future_products as $future_product)
				<tr class="table-warning">
					<td> {{$loop->index+1}} </td>
					<td>
						<img src="{{asset('upload/future/main')}}/{{$future_product->product_image}}" alt="not found">
					</td>
					<td>{{$future_product->name}}</td>
					<td>{{Str::limit($future_product->title,8)}}</td>
					<td>{{Str::limit($future_product->description,14)}}</td>
					<td>{{$future_product->code}}</td>
					<td>
						<a href="{{url('/future/view/product/restore')}}/{{$future_product->id}}"><i class="fas fa-window-restore"></i></a>
						<a href="{{url('/future/view/premanently/delete')}}/{{$future_product->id}}"><i class="fas fa-trash-alt"></i></a>
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