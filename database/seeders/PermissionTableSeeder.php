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
                'name' => 'users_edit',
            ],

            [
                'name' => 'users_delete',
            ],

            [
                'name' => 'users_create',
            ],

            [
                'name' => 'users_show',
            ],


            // role permissions

            [
                'name' => 'roles_access',
            ],

            [
                'name' => 'roles_edit',
            ],

            [
                'name' => 'roles_delete',
            ],

            [
                'name' => 'roles_create',
            ],

            [
                'name' => 'roles_show',
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
                'name' => 'products_access'
            ],
            [
                'name' => 'products_edit'
            ],
            [
                'name' => 'products_delete'
            ],
            [
                'name' => 'products_create'
            ],

            //pelanggan permissions
            [
                'name' => 'customers_access'
            ],
            [
                'name' => 'customers_edit'
            ],
            [
                'name' => 'customers_delete'
            ],
            [
                'name' => 'customers_create'
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
