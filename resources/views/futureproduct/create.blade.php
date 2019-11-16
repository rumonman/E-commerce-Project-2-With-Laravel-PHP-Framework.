@extends('layout.admin')
@section('content')
<div class="col-md-6 grid-margin stretch-card">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Add Future Product Form</h4>
		</div>
			@if (session('insert'))
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				{{ session('insert') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card-body">
	<form action="{{url('/future/product/insert')}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label>Product Name</label>
				<input type="text" class="form-control" placeholder="Name" name="name">
			</div>
			<div class="form-group">
				<label>Product Title</label>
				<input type="text" class="form-control" placeholder="Product Title" name="title">
			</div>
			<div class="form-group">
				<label>Product Description</label>
				<textarea type="text" class="form-control" placeholder="Product Description" name="description" rows="3"></textarea>
			</div>
			
			<div class="form-group">
				<label>Product Code</label>
				<input type="text" class="form-control" placeholder="Product Code" name="code">
			</div>

			<div class="form-group">
				<label>Product Image</label>
				<input type="file" class="form-control" name="product_image">
			</div>
			<button type="submit" class="btn btn-success mr-2">Submit</button>
			<button class="btn btn-light">Cancel</button>
		</form>
</div>
</div>
</div>

@endsection