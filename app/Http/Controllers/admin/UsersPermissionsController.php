<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersPermissionsController extends Controller
{
     public function update(Request $request,User $user)
    {
        $user->permissions()->detach();
        if($request->filled('permissions')){
            $user->givePermissionTo($request->permissions);
        }

        return back()->withFlash('Permissions updated');
    }
}
