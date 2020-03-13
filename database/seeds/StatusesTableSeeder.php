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
        $statuses = [
            ['id' => '01', 'description' => 'enabled'],
            ['id' => '02', 'description' => 'disabled'],
            ['id' => '03', 'description' => 'active'],
            ['id' => '04', 'description' => 'inactive']
        ];

        DB::table('statuses')->insert($statuses);
    }
}
