@extends('layout.admin')
@section('content')
<div class="col-md-6 grid-margin stretch-card">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Edit Product</h4>
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
	<form action="{{url('/product/update')}}/{{$edit_product->id}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label>Product Name</label>
				<input type="text" class="form-control" placeholder="Name" name="name" value="{{$edit_product->name}}">
			</div>
			<div class="form-group">
				<label>Product Title</label>
				<input type="text" class="form-control" placeholder="Product Title" name="title" value="{{$edit_product->title}}">
			</div>
			<div class="form-group">
				<label>Product Description</label>
				<textarea type="text" class="form-control" placeholder="Product Description" name="description" rows="3">{{$edit_product->description}}"</textarea>
			</div>
			
			<div class="form-group">
				<label>Product Quantity</label>
				<input type="text" class="form-control" placeholder=" Product Quantity" name="quantity" value="{{$edit_product->quantity}}">
			</div>
			<div class="form-group">
				<label>Product Code</label>
				<input type="text" class="form-control" placeholder="Product Code" name="code" value="{{$edit_product->code}}">
			</div>
			<div class="form-group">
				<label>Product Price</label>
				<input type="text" class="form-control" placeholder="Product Price" name="price" value="{{$edit_product->price}}">
			</div>
			<div class="form-group">
				<label>Product Image</label>
				<input type="file" class="form-control" name="product_image" >
				<img src="{{asset('upload/photos/main/')}}/{{$edit_product->product_image}}" alt="not fount" width="90px">
			</div>
			<button type="submit" class="btn btn-success mr-2">Updates</button>
		</form>
	 </div>
   </div>
</div>
</div>
@endsection