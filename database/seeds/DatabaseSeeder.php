<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StatusesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolePermissionsTableSeeder::class);
        $this->call(DocumentTypesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}






// <?php

// use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;

// class DocumentTypesTableSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      *
//      * @return void
//      */
//     public function run()
//     {
//         $doc_types = [
//             ['id' => 'ci', 'status_id' => '01', 'description' => 'Cédula de identidad'],
//             ['id' => 'rif', 'status_id' => '01', 'description' => 'RIF'],
//             ['id' => 'p', 'status_id' => '01', 'description' => 'Pasaporte']
//         ];

//         DB::table('document_types')->insert($doc_types);
//     }
// }
