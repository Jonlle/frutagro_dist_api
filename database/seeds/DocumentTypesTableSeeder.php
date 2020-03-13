<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doc_types = [
            ['id' => 'ci', 'status_id' => '01', 'description' => 'Cédula de identidad'],
            ['id' => 'rif', 'status_id' => '01', 'description' => 'RIF'],
            ['id' => 'p', 'status_id' => '01', 'description' => 'Pasaporte']
        ];

        DB::table('document_types')->insert($doc_types);
    }
}
