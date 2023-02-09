
@if($role->exists)
	<div class="form-group">
		<label for="name">Identificator</label>
		<input value="{{$role->name}}" class="form-control" disabled>
	</div>
@else
	<div class="form-group">
		<label for="name">Identificator</label>
		<input name="name" value="{{old('name',$role->name)}}" class="form-control">
	</div>
@endif

<div class="form-group">
	<label for="display_name">Display Name</label>
	<input name="display_name" value="{{old('display_name',$role->display_name)}}" class="form-control">
</div>


<!--<div class="form-group">
	<label for="guard_name">Guard Name</label>
	<select name="guard_name" class="form-control">
		@foreach(config('auth.guards') as $guardName => $guard)
			<option {{old('guard_name',$role->guard_name)===$role->guard_name ? 'selected':''}}
				value="{{$guardName}}">{{$guardName}}</option>
			}
		@endforeach
	</select>
</div>-->
<div class="row">
	<div class="col-md-6">
		@include('admin.permissions.checkboxes',['model'=>$role])
	</div>
</div>