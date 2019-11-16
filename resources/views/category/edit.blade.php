@extends('layout.admin')
@section('content')
<div class="col-md-6 grid-margin stretch-card">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Edit Category Form</h4>
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

			<form action="{{url('/category/edit/update/form')}}/{{$edits->id}}" method="post">
				@csrf
				<div class="form-group">
					<label>Category Name</label>
					<input type="text" class="form-control" name="category_name" value="{{$edits->category_name}}">
				</div>
				<button type="submit" class="btn btn-success mr-2">Update</button>
				<button class="btn btn-light">Cancel</button>
			</form>
		</div>
	</div>
</div>
</div>
@endsection