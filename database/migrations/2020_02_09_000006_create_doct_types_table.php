<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctTypesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'doct_types';

    /**
     * Run the migrations.
     * @table doct_types
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->string('doc_type_id', 3);
            $table->string('status_id', 2);
            $table->string('description', 50);

            $table->primary('doc_type_id');

            $table->index(["status_id"], 'fk_doct_types_statuses_idx');


            $table->foreign('status_id', 'fk_doct_types_statuses')
                  ->references('status_id')->on('statuses')
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
