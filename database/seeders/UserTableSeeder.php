<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate(); 
        User::truncate(); 
        Role::truncate(); 

        $adminRole = Role::create(['name'=>'Admin','display_name'=>'Administrator']);
        $writerRole = Role::create(['name'=>'Writer','display_name'=>'Writer']);
        
        //Creating Permissions
        $viewPostsPermission = Permission::create(['name'=>'ViewPosts','display_name'=>'View Posts']);
        $createPostsPermission = Permission::create(['name'=>'CreatePosts','display_name'=>'Create Posts']);
        $updatePostsPermission = Permission::create(['name'=>'UpdatePosts','display_name'=>'Update Posts']);
        $deletePostsPermission = Permission::create(['name'=>'DeletePosts','display_name'=>'Delete Posts']);
        
        $viewUsersPermission = Permission::create(['name'=>'ViewUsers','display_name'=>'View Users']);
        $createUsersPermission = Permission::create(['name'=>'CreateUsers','display_name'=>'Create Users']);
        $updateUsersPermission = Permission::create(['name'=>'UpdateUsers','display_name'=>'Update Users']);
        $deleteUsersPermission = Permission::create(['name'=>'DeleteUsers','display_name'=>'Delete Users']);
        
        $viewRolesPermission = Permission::create(['name'=>'ViewRoles','display_name'=>'View Roles']);
        $createRolesPermission = Permission::create(['name'=>'CreateRoles','display_name'=>'Create Roles']);
        $updateRolesPermission = Permission::create(['name'=>'UpdateRoles','display_name'=>'Update Roles']);
        $deleteRolesPermission = Permission::create(['name'=>'DeleteRoles','display_name'=>'Delete Roles']);

        $viewPermissionsPermission = Permission::create(['name'=>'ViewPermissions','display_name'=>'View Permissions']);
        $createPermissionsPermission = Permission::create(['name'=>'CreatePermissions','display_name'=>'Create Permissions']);
        $updatePermissionsPermission = Permission::create(['name'=>'UpdatePermissions','display_name'=>'Update Permissions']);
        $deletePermissionsPermission = Permission::create(['name'=>'DeletePermissions','display_name'=>'Delete Permissions']);
        
        //Giving Permission to Roles
        $adminRole->givePermissionTo($viewPostsPermission);
        $adminRole->givePermissionTo($createPostsPermission);
        $adminRole->givePermissionTo($updatePostsPermission);
        $adminRole->givePermissionTo($deletePostsPermission);
        
        $adminRole->givePermissionTo($viewUsersPermission);
        $adminRole->givePermissionTo($createUsersPermission);
        $adminRole->givePermissionTo($updateUsersPermission);
        $adminRole->givePermissionTo($deleteUsersPermission);

        $adminRole->givePermissionTo($viewRolesPermission);
        $adminRole->givePermissionTo($createRolesPermission);
        $adminRole->givePermissionTo($updateRolesPermission);
        $adminRole->givePermissionTo($deleteRolesPermission);

        $adminRole->givePermissionTo($viewPermissionsPermission);
        $adminRole->givePermissionTo($createPermissionsPermission);
        $adminRole->givePermissionTo($updatePermissionsPermission);
        $adminRole->givePermissionTo($deletePermissionsPermission);

        $writerRole->givePermissionTo($viewPostsPermission);
        $writerRole->givePermissionTo($createPostsPermission);
        $writerRole->givePermissionTo($updatePostsPermission);
        $writerRole->givePermissionTo($deletePostsPermission);

        $admin = new User;
        $admin->name = 'Bladimir';
        $admin->email = 'malavebj@gmail.com';
        $admin->password = '1234';
        $admin->save();
        $admin->assignRole($adminRole);

        $writer = new User;
        $writer->name = 'Jose';
        $writer->email = 'jose@gmail.com';
        $writer->password = '1234';
        $writer->save();
        $writer->assignRole($writerRole);        
        
        $admin = new User;
        $admin->name = 'Juan';
        $admin->email = 'juan@gmail.com';
        $admin->password = '1234';
        $admin->save();
        $admin->assignRole($writerRole);

        $writer = new User;
        $writer->name = 'Manuel';
        $writer->email = 'manuel@gmail.com';
        $writer->password = '1234';
        $writer->save();
        $writer->assignRole($writerRole);

        $admin = new User;
        $admin->name = 'Pedro';
        $admin->email = 'pedro@gmail.com';
        $admin->password = '1234';
        $admin->save();
        $admin->assignRole($writerRole);

        $writer = new User;
        $writer->name = 'Diego';
        $writer->email = 'diego@gmail.com';
        $writer->password = '1234';
        $writer->save();
        $writer->assignRole($writerRole);
    }
}
