<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            
            // routes admin 
            $Permission = ['name' => 'Admins Show', 'route_name' => 'admins-list'], 
            $Permission = ['name' => 'Admin Add', 'route_name' => 'create-new-admin'],
            $Permission = ['name' => 'Admin Add store', 'route_name' => 'store-new-admin'],
            $Permission = ['name' => 'Admin Delete', 'route_name' => 'admin-delete'],
            $Permission = ['name' => 'Admin Activate', 'route_name' => 'admin-activate'],
            $Permission = ['name' => 'Admin UnActivate', 'route_name' => 'admin-deactivate'],
            $Permission = ['name' => 'Admin Role', 'route_name' => 'admin/role'],

            // routes role 
            $Permission = ['name' => 'Roles Show', 'route_name' => 'roles'],
            $Permission = ['name' => 'Role Add', 'route_name' => 'roles/create'],
            $Permission = ['name' => 'Role Add store', 'route_name' => 'roles/store'],
            $Permission = ['name' => 'Role Delete', 'route_name' => 'roles/delete'],
            $Permission = ['name' => 'Role Information', 'route_name' => 'roles/show'],
            $Permission = ['name' => 'Role Edit', 'route_name' => 'roles/edit'],
            $Permission = ['name' => 'Role Update', 'route_name' => 'roles/update'],

            // routes vendor 
            $Permission = ['name' => 'Vendors Show', 'route_name' => 'vendors'],
            $Permission = ['name' => 'Vendor Add', 'route_name' => 'vendors/create'],
            $Permission = ['name' => 'Vendor Add Store', 'route_name' => 'vendors/store'],
            $Permission = ['name' => 'Vendor Delete', 'route_name' => 'vendors/delete'],
            $Permission = ['name' => 'Vendor Activate', 'route_name' => 'vendors/activate'],
            $Permission = ['name' => 'Vendor UnActivate', 'route_name' => 'vendors/deactivate'],
            $Permission = ['name' => 'Vendor Special', 'route_name' => 'vendors/special'],
            $Permission = ['name' => 'Vendor UnSpecial', 'route_name' => 'vendors/unspecial'],

            // routes user 
            $Permission = ['name' => 'Users Show', 'route_name' => 'users'],
            $Permission = ['name' => 'User Add', 'route_name' => 'users/create'],
            $Permission = ['name' => 'User Add store', 'route_name' => 'users/store'],
            $Permission = ['name' => 'User Delete', 'route_name' => 'users/delete'],
            $Permission = ['name' => 'User Activate', 'route_name' => 'users/activate'],
            $Permission = ['name' => 'User UnActivate', 'route_name' => 'users/deactivate'],

            // routes main categroy 
            $Permission = ['name' => 'Main Categories Show', 'route_name' => 'main-category.index'],
            $Permission = ['name' => 'Main Category Add', 'route_name' => 'main-category.create'],
            $Permission = ['name' => 'Main Category Add store', 'route_name' => 'main-category.store'],
            $Permission = ['name' => 'Main Category Edit', 'route_name' => 'main-category.edit'],
            $Permission = ['name' => 'Main Category Update', 'route_name' => 'main-categories-update'],
            $Permission = ['name' => 'Main Category Delete', 'route_name' => 'main-categories-delete'],
            $Permission = ['name' => 'Main Category Activate', 'route_name' => 'main-categories-activate'],
            $Permission = ['name' => 'Main Category UnActivate', 'route_name' => 'main-categories-deactivate'],
            $Permission = ['name' => 'Main Category Lang AR', 'route_name' => 'main-categories-lang/ar'],
            $Permission = ['name' => 'Main Category Lang ES', 'route_name' => 'main-categories-lang/es'],

            // routes main categroy 
            $Permission = ['name' => 'Sub Categories Show', 'route_name' => 'sub-category.index'],
            $Permission = ['name' => 'Sub Category Add', 'route_name' => 'sub-category.create'],
            $Permission = ['name' => 'Sub Category Add Store', 'route_name' => 'sub-category.store'],
            $Permission = ['name' => 'Sub Category Edit', 'route_name' => 'sub-category.edit'],
            $Permission = ['name' => 'Sub Category Update', 'route_name' => 'sub-categories-update'],
            $Permission = ['name' => 'Sub Category Delete', 'route_name' => 'sub-categories-delete'],
            $Permission = ['name' => 'Sub Category Activate', 'route_name' => 'sub-categories-activate'],
            $Permission = ['name' => 'Sub Category UnActivate', 'route_name' => 'sub-categories-deactivate'],
            $Permission = ['name' => 'Sub Category Lang AR', 'route_name' => 'sub-categories-lang/ar'],
            $Permission = ['name' => 'Sub Category Lang ES', 'route_name' => 'sub-categories-lang/es'],
            
        ];
        foreach ($permissions as $row) {
            Permission::create($row);
        }
    }
}
