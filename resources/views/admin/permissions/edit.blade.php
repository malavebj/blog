@extends('admin.layout')

@section('content')

	<div class="row">
		<div class="col-md-6">
			<div class="card card-primary card-outline">
				<div class="card-header with-border">
					<h3 class="card-title ">Permissions</h3>
				</div>
				@include('admin.partials.err-message')
				<form method="POST" action="{{ route('admin.permissions.update',$permission) }}">
                    {{ csrf_field() }}{{ method_field('PUT') }}
					<div class="card-body">
						<div class="form-group">
							<label>Identificator</label>
							<input disabled value="{{$permission->name}}" class="form-control">
						</div>
						<div class="form-group">
							<label for="display_name">Display Name</label>
							<input name="display_name" value="{{old('display_name',$permission->display_name)}}" class="form-control">
						</div>
						<button class="btn btn-primary btn-block">Update Permission</button>
					</div>
				</form>
			</div>
		</div>		
	</div>

@endsection
