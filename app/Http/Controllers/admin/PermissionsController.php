<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{

    public function index()
    {
        $this->authorize('view',new Permission);
        $permissions=Permission::all();
        return view('admin.permissions.index',compact('permissions'));
    }
    
    public function edit(Permission $permission)
    {
        $this->authorize('update',$permission);
        return view('admin.permissions.edit',['permission'=>$permission]);
    }

    public function update(Request $request, Permission $permission)
    {
        $this->authorize('update',$permission);
        $data=$request->validate(['display_name'=>'required']);    
        $permission->update($data);
        return redirect()->route('admin.permissions.edit',$permission)->withFlash('permissions Updated');
    }

}
