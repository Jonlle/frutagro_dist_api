<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doct_types')->insert([
            ['doc_type_id' => 'ci', 'status_id' => '01', 'description' => 'Cédula de identidad'],
            ['doc_type_id' => 'rif', 'status_id' => '01', 'description' => 'RIF'],
            ['doc_type_id' => 'p', 'status_id' => '01', 'description' => 'Pasaporte']
        ]);
    }
}
