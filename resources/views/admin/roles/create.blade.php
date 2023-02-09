@extends('admin.layout')

@section('content')

	<div class="row">
		<div class="col-md-6">
			<div class="card card-primary card-outline">
				<div class="card-header with-border">
					<h3 class="card-title ">Roles</h3>
				</div>
				@include('admin.partials.err-message')
				<form method="POST" action="{{ route('admin.roles.store') }}">
                    {{ csrf_field() }}
					<div class="card-body">
						@include('admin.roles.form')
						<button class="btn btn-primary btn-block">Create Role</button>
					</div>
				</form>
			</div>
		</div>		
	</div>

@endsection
