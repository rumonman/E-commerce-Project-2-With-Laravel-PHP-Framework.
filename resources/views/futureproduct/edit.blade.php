@extends('layout.admin')
@section('content')
<div class="col-md-6 grid-margin stretch-card">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Edit Future Product</h4>
		</div>
		<div class="card-body">
			@if (session('update'))
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				{{ session('update') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			@endif
			<form action="{{url('/future/view/product/update')}}/{{$edit_future->id}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label>Product Name</label>
					<input type="text" class="form-control" placeholder="Name" name="name" value="{{$edit_future->name}}">
				</div>
				<div class="form-group">
					<label>Product Title</label>
					<input type="text" class="form-control" placeholder="Product Title" name="title" value="{{$edit_future->title}}">
				</div>
				<div class="form-group">
					<label>Product Description</label>
					<textarea type="text" class="form-control" placeholder="Product Description" name="description" rows="3">{{$edit_future->description}}"</textarea>
				</div>
				<div class="form-group">
					<label>Product Code</label>
					<input type="text" class="form-control" placeholder="Product Code" name="code" value="{{$edit_future->code}}">
				</div>
				<div class="form-group">
					<label>Product Image</label>
					<input type="file" class="form-control" name="product_image">
					<img src="{{asset('upload/future/main')}}/{{$edit_future->product_image}}" alt="Not Found" width="90px">
				</div>
				
				<button type="submit" class="btn btn-success mr-2">Updates</button>
			</form>
		</div>
	</div>
</div>
</div>
@endsection