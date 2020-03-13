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
            $table->increments('id');
            $table->string('phone_number', 11);
            $table->string('status_id', 2);
            $table->unsignedInteger('user_id');
            $table->string('principal', 1);
            $table->timestamps();

            $table->unique('phone_number');

            $table->index(["user_id"], 'fk_user_phones_users_idx');
            $table->index(["status_id"], 'fk_user_phones_statuses_idx');

            $table->foreign('status_id', 'fk_user_phones_statuses')
                  ->references('id')->on('statuses')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->foreign('user_id', 'fk_user_phones_users')
                  ->references('id')->on('users')
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
