<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['permission_id' => 'create', 'status_id' => '01'],
            ['permission_id' => 'read', 'status_id' => '01'],
            ['permission_id' => 'update', 'status_id' => '01'],
            ['permission_id' => 'delete', 'status_id' => '01']
        ];

        DB::table('permissions')->insert($permissions);
    }
}
