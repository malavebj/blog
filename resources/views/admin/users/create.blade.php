@extends('admin.layout')

@section('content')

	<div class="row">
		<div class="col-md-6">
			<div class="card card-primary card-outline">
				<div class="card-header with-border">
					<h3 class="card-title ">Personal Information</h3>
				</div>
				@include('admin.partials.err-message')
				<form method="POST" action="{{ route('admin.users.store', $user) }}">
                    {{ csrf_field() }}
					<div class="card-body">
						<div class="form-group">
							<label for="name">Name</label>
							<input name="name" value="{{old('name')}}" class="form-control">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input name="email" value="{{old('email')}}" class="form-control">
						</div>
						<div class="row">
							<div class="col-md-6">
								@include('admin.roles.checkboxes')
							</div>
							<div class="col-md-6">
								@include('admin.permissions.checkboxes',['model'=>$user])
							</div>
						</div>
						<span class="help-block">Password will be sent by Email</span>
						<button class="btn btn-primary btn-block">Create User</button>
					</div>
				</form>
			</div>
		</div>		
	</div>

@endsection
