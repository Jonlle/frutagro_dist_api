<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            'username' => 'frutagro',
            'doc_type_id' => 'rif',
            'role_id' => 'owner',
            'status_id' => '01',
            'first_name' => 'Frutagro',
            'last_name' => 'Distribuidora',
            'document' => 'J1234',
            'password' => bcrypt('frutagro'),
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
        ];

        DB::table('users')->insert($users);
    }
}
