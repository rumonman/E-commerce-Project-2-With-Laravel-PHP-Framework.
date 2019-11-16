@extends('layout.admin')
@section('content')
<div class="col-md-6 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">User Edit</h4>
			@if (session('edit'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{{ session('edit') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
		@endif

	<form action="{{url('/all/user/update')}}/{{$edit_user->id}}" method="post">
			@csrf
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" name="first_name" value="{{$edit_user->first_name}}">
			</div>
			<div class="form-group">
				<label>Last Name</label>
				<input type="text" class="form-control" name="last_name" value="{{$edit_user->last_name}}">
			</div>
			
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="email" value="{{$edit_user->email}}" >
			</div>
			
			
			<button type="submit" class="btn btn-success mr-2">Updates</button>
			
		</form>
	</div>
</div>
</div>
@endsection