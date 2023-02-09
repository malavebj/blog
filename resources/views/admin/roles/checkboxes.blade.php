@foreach($roles as $role)
	<div class="checkbox">
		<label>
			<input type="checkbox" value="{{$role->name}}" name="roles[]" {{$user->roles->contains($role->id) ? 'checked':''}}> 
			{{$role->name}}
		</label>
		<div style="line-height:0px;">
			<small class="text-mute" >{{$role->permissions->pluck('name')->implode(', ')}}</small>			
		</div>
	</div>
	<br>
@endforeach