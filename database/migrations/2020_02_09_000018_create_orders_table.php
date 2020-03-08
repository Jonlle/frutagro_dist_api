<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'orders';

    /**
     * Run the migrations.
     * @table orders
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('order_id');
            $table->unsignedInteger('payment_id');
            $table->string('status_id', 2);
            $table->string('username', 10);
            $table->date('order_date');
            $table->date('date_processed');
            $table->string('address_to_send', 200);

            $table->index(["username"], 'fk_orders_users_idx');

            $table->index(["status_id"], 'fk_orders_statuses_idx');

            $table->index(["payment_id"], 'fk_orders_payments_idx');


            $table->foreign('payment_id', 'fk_orders_payments')
                  ->references('payment_id')->on('payments')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->foreign('status_id', 'fk_orders_statuses')
                  ->references('status_id')->on('statuses')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->foreign('username', 'fk_orders_users')
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
