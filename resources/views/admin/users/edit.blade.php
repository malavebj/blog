@extends('admin.layout')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="card card-primary card-outline">
				<div class="card-header with-border">
					<h3 class="card-title ">Personal Information</h3>
				</div>
				@include('admin.partials.err-message')
				<form method="POST" action="{{ route('admin.users.update', $user) }}">
                    {{ csrf_field() }}{{ method_field('PUT') }}
					<div class="card-body">
						<div class="form-group">
							<label for="name">Name</label>
							<input name="name" value="{{old('name', $user->name)}}" class="form-control">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input name="email" value="{{old('email', $user->email)}}" class="form-control">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" class="form-control" placeholder="password" >
						</div>
						<div class="form-group">
							<label for="password_confirmation">Password confirm</label>
							<input type="password" name="password_confirmation" class="form-control" placeholder="password confirm">
						</div>
						<button class="btn btn-primary btn-block">Update User</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card card-primary card-outline">
				<div class="card-header with-border">
					<h3 class="card-title">Roles</h3>
				</div>
				<div class="card-body">
					@role('Admin')	
						<form method="POST" action="{{route('admin.users.roles.update',$user)}}">
	            		{{ csrf_field() }}{{ method_field('PUT') }}
							@include('admin.roles.checkboxes')
							<button class="btn btn-primary btn-block">Update Roles</button>
						</form>
					@else
						<ul class="list-group">
							@forelse($user->roles as $role)
								<li class="list group-item"> {{$role->name}} </li>
							@empty
								<li class="list group-item"> No tienes Roles asignados </li>
							@endforelse
						</ul>
					@endrole
				</div>
			</div>
			<div class="card card-primary card-outline">
				<div class="card-header with-border">
					<h3 class="card-title">Permissions</h3>
				</div>
				<div class="card-body">
					@role('Admin')	
						<form method="POST" action="{{route('admin.users.permissions.update',$user)}}">
	            		{{ csrf_field() }}{{ method_field('PUT') }}
							@include('admin.permissions.checkboxes',['model'=>$user])
							<button class="btn btn-primary btn-block">Update Permissions</button>
						</form>
					@else
						<ul class="list-group">
							@forelse($user->roles as $role)
								<li class="list group-item"> {{$role->name}} </li>
							@empty
								<li class="list group-item"> No tienes Roles asignados </li>
							@endforelse
						</ul>
					@endrole
				</div>
			</div>
		</div>
	</div>

@endsection