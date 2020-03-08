<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAddressesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'user_addresses';

    /**
     * Run the migrations.
     * @table user_address
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('address_id');
            $table->string('address_type_id', 10);
            $table->string('username', 10);
            $table->string('address', 200);
            $table->timestamps();

            $table->index(["address_type_id"], 'fk_user_address_address_types_idx');

            $table->index(["username"], 'fk_user_address_users_idx');


            $table->foreign('address_type_id', 'fk_user_address_address_types')
                  ->references('address_type_id')->on('address_types')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->foreign('username', 'fk_user_address_users')
                  ->references('username')->on('users')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
