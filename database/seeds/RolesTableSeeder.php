<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['role_id' => 'admin', 'status_id' => '01', 'description' => 'Usuario Administrador'],
            ['role_id' => 'user', 'status_id' => '01', 'description' => 'Usuario']
        ]);
    }
}
