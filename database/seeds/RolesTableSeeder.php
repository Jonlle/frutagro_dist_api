<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['role_id' => 'owner', 'status_id' => '01', 'description' => 'Usuario Propietario'],
            ['role_id' => 'admin', 'status_id' => '01', 'description' => 'Usuario Administrador'],
            ['role_id' => 'user', 'status_id' => '01', 'description' => 'Usuario'],
        ];

        DB::table('roles')->insert($roles);
    }
}
