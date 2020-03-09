<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            ['status_id' => '01', 'description' => 'enabled'],
            ['status_id' => '02', 'description' => 'disabled'],
            ['status_id' => '03', 'description' => 'active'],
            ['status_id' => '04', 'description' => 'inactive']
        ]);
    }
}
