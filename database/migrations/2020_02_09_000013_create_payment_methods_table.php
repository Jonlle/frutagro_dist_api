<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentMethodsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'payment_methods';

    /**
     * Run the migrations.
     * @table payment_methods
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('pay_meth_id');
            $table->string('entity_name', 100);
            $table->unsignedInteger('payment_id');
            $table->string('payment_type_id', 10);
            $table->string('reference_id', 25);

            $table->index(["payment_id"], 'fk_payments_methods_payment_idx');

            $table->index(["payment_type_id"], 'fk_payment_methods_payment_types_idx');

            $table->index(["entity_name"], 'fk_payment_methods_financial_entity_idx');


            $table->foreign('entity_name', 'fk_payment_methods_financial_entity')
                  ->references('entity_name')->on('financial_entities')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->foreign('payment_type_id', 'fk_payment_methods_payment_types')
                  ->references('PAYMENT_TYPE_ID')->on('payment_types')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->foreign('payment_id', 'fk_payment_methods_payments')
                  ->references('payment_id')->on('payments')
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
