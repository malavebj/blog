<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SaveRolesRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view',new Role);// authorize() invoca Policy
        $roles=Role::all();
        return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $this->authorize('create',$role = new Role);// authorize() invoca Policy
        return view('admin.roles.create',[
            'permissions'=>Permission::pluck('name','id'),
            'role'=>$role
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveRolesRequest $request)
    {
        /*$data=$request->validate([
            'name'=>'required|unique:roles',
            'display_name'=>'required'
        ]);*///it's validated in the request "SaveRolesRequest"

        $this->authorize('create',$role=new Role);// authorize() invoca Policy
        $role=Role::create($request->validated());
        if($request->has('permissions'))        
            $role->givePermissionTo($request->permissions);
        return redirect()->route('admin.roles.index')->withFlash('New Role Created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->authorize('update',$role);// authorize() invoca Policy
        return view('admin.roles.edit',[
            'permissions'=>Permission::pluck('name','id'),
            'role'=>$role
        ]);
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveRolesRequest $request, Role $role)
    {
        //$data=$request->validate(['display_name'=>'required']); it's validated in the request "SaveRolesRequest"
        $this->authorize('update',$role);// authorize() invoca Policy
        $role->update($request->validated());
        $role->permissions()->detach();
        if($request->has('permissions'))        
            $role->givePermissionTo($request->permissions);
        return redirect()->route('admin.roles.edit',$role)->withFlash('Role Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete',$role);// authorize() invoca Policy
        $role->delete();
        return redirect()->route('admin.roles.index')->withFlash('Role Deleted');
    }
}
