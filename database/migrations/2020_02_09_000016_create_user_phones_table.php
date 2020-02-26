<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPhonesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'user_phones';

    /**
     * Run the migrations.
     * @table user_phones
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->string('phone_number', 11);
            $table->string('status_id', 2);
            $table->string('username', 10);
            $table->string('principal', 1);
            $table->date('date_created');
            $table->date('date_modified');

            $table->primary('phone_number');

            $table->index(["username"], 'fk_user_phones_users_idx');

            $table->index(["status_id"], 'fk_user_phones_statuses_idx');


            $table->foreign('status_id', 'fk_user_phones_statuses')
                  ->references('status_id')->on('statuses')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->foreign('username', 'fk_user_phones_users')
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
