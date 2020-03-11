<?php

use Illuminate\Database\Seeder;

class RolePermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_permissions = [
            ['permission_id' => 'create', 'role_id' => 'owner'],
            ['permission_id' => 'read', 'role_id' => 'owner'],
            ['permission_id' => 'update', 'role_id' => 'owner'],
            ['permission_id' => 'delete', 'role_id' => 'owner']
        ];
        // 'role_perm_id' => 'create'
        DB::table('role_permissions')->insert($role_permissions);
    }
}
