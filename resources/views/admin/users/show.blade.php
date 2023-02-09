@extends('admin.layout')

@section('content')

<div class="row">
	<div class="col-md-3">
		
  		<!-- Profile Image -->
	    <div class="card card-primary card-outline">
	      <div class="card-body box-profile">
	        <div class="text-center">
	          <img class="profile-user-img img-fluid img-circle"
	               src= "{{ asset('adminlte/img/user4-128x128.jpg') }}"
	               alt="User profile picture">
	        </div>

	        <h3 class="profile-username text-center">{{$user->name}}</h3>

	        <p class="text-muted text-center">{{$user->getRoleNames()->implode(', ')}}</p>

	        <ul class="list-group list-group-unbordered mb-3">
	          <li class="list-group-item">
	            <b>Email</b> <a class="float-right">{{$user->email}}</a>
	          </li>
	          <li class="list-group-item">
	            <b>Posts</b> <a class="float-right">{{$user->posts->count()}}</a>
	          </li>
	          @if($user->roles->count())
		        <li class="list-group-item">
		          <b>Roles</b> <a class="float-right">{{$user->getRoleNames()->implode(', ')}}</a>
		        </li>
		      @endif
	        </ul>

	        <a href="{{route('admin.users.edit',$user)}}" class="btn btn-primary btn-block"><b>Edit</b></a>
	      </div>
	      <!-- /.card-body -->
	    </div>
	    <!-- /.card -->

	</div>
	<div class="col-md-3">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<h3 class="card-title">Posts</h3>
			</div>
			<div class="card-body">
				@forelse($user->posts as $post)
					<a href="{{route('post.show', $post)}}" target="blank">
						<strong>{{$post->title}}</strong><br>
					</a>
					<small class="text-muted">Published at {{$post->published_at->format('m/d/Y')}}</small>
					<p class="text-muted">{{$post->excerpt}}</p>
					@unless($loop->last)
						<hr>
					@endunless
				@empty
					<small class="text-muted">
						You don't have Posts
					</small>
				@endforelse
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<h3 class="card-title">Roles</h3>
			</div>
			<div class="card-body">
				@forelse($user->roles as $role)
					<strong>{{$role->name}}</strong><br>
					@if($role->permissions->count())
						<small class="text-muted">
							Permisos: {{$role->permissions->pluck('name')->implode(', ')}}
						</small>
					@endif
					@unless($loop->last)
						<hr>
					@endunless
				@empty
					<small class="text-muted">
						You don't have Roles assigned
					</small>
				@endforelse
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<h3 class="card-title">Permissions</h3>
			</div>
			<div class="card-body">
				@forelse($user->permissions as $permission)
					<strong>{{$permission->name}}</strong><br>
					@unless($loop->last)
						<hr>
					@endunless
				@empty
					<small class="text-muted">
						You don't have extra permissions
					</small>
				@endforelse
			</div>
		</div>

	</div>

</div>



@endsection
