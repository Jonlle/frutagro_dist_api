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
            ['id' => 'create', 'status_id' => '01'],
            ['id' => 'read', 'status_id' => '01'],
            ['id' => 'update', 'status_id' => '01'],
            ['id' => 'delete', 'status_id' => '01']
        ];

        DB::table('permissions')->insert($permissions);
    }
}
