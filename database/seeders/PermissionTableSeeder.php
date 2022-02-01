<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

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

            // admin panel permissions

            [
                'name' => 'admin_panel_access',
            ],

            // user permissions

            [
                'name' => 'users_access',
            ],

            [
                'name' => 'user_edit',
            ],

            [
                'name' => 'user_delete',
            ],

            [
                'name' => 'user_create',
            ],

            [
                'name' => 'user_show',
            ],


            // role permissions

            [
                'name' => 'roles_access',
            ],

            [
                'name' => 'role_edit',
            ],

            [
                'name' => 'role_delete',
            ],

            [
                'name' => 'role_create',
            ],

            [
                'name' => 'role_show',
            ],


            // permission permissions

            [
                'name' => 'permissions_access',
            ],

            [
                'name' => 'permission_edit',
            ],

            [
                'name' => 'permission_delete',
            ],

            [
                'name' => 'permission_create',
            ],
            //product permissions
            [
                'name' => 'product_access'
            ],
            [
                'name' => 'product_edit'
            ],
            [
                'name' => 'product_delete'
            ],
            [
                'name' => 'product_create'
            ],

            //satuan permissions
            [
                'name' => 'denomination_access'
            ],
            [
                'name' => 'denomination_edit'
            ],
            [
                'name' => 'denomination_delete'
            ],
            [
                'name' => 'denomination_create'
            ],
            //pelanggan permissions
            [
                'name' => 'customer_access'
            ],
            [
                'name' => 'customer_edit'
            ],
            [
                'name' => 'customer_delete'
            ],
            [
                'name' => 'customer_create'
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
