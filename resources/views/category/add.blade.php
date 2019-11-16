@extends('layout.admin')
@section('content')
<div class="col-md-6 grid-margin stretch-card">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Add Category Form</h4>
		</div>
		<div class="card-body">
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
			<form action="{{url('add/category/insert/form')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label>Category Name</label>
					<input type="text" class="form-control" placeholder="Category Name" name="category_name">
				</div>
				<div class="form-group">
					<input type="checkbox" name="manu_status" id="manu" value="1">    
					<label for="manu">Use The Manu</label>
				</div>
				<button type="submit" class="btn btn-success mr-2">Submit</button>
				<button class="btn btn-light">Cancel</button>
			</form>
		</div>
	</div>
</div>
</div>
@endsection