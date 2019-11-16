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
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				{{ session('force') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			@endif
			<div class="row">
				<div class="col-md-8 card_header_text">
					<i class="fa fa-th"></i> Delete Contact Message
				</div>
				<div class="col-md-4 text-right">
					<a href="#" class="btn btn-dark btn-sm card_button"><i class="fa fa-th"></i> All Message</a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		
		<div class="card-body">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Sl No </th>
						<th>Name </th>
						<th>Email </th>
						<th>Subject </th>
						<th>Message </th>
						<th>Manage </th>
					</tr>
				</thead>
				<tbody>
					@forelse($delete_contuct as $contuct)

					<tr class="table-warning">
						<td> {{$loop->index+1}} </td>
						<td>{{$contuct->name}}</td>
						<td>{{$contuct->email}}</td>
						<td>{{$contuct->subject}}</td>
						<td>{{Str::limit($contuct->message,14)}}</td>
						<td>
							<a href="{{url('/contuct/message/restore')}}/{{$contuct->id}}"><i class="fas fa-window-restore"></i></a>
							<a href="{{url('/contuct/message/force/delete')}}/{{$contuct->id}}"><i class="fas fa-trash-alt"></i></a>
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