<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'order_products';

    /**
     * Run the migrations.
     * @table order_products
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('order_pro_id');
            $table->integer('order_id');
            $table->integer('product_id');
            $table->integer('tax_id');
            $table->integer('quantity');
            $table->integer('discount');
            $table->string('unit', 10);

            $table->index(["tax_id"], 'fk_order_products_taxes_idx');

            $table->index(["order_id"], 'fk_order_products_orders_idx');

            $table->index(["product_id"], 'fk_order_products_products_idx');


            $table->foreign('order_id', 'fk_order_products_orders')
                  ->references('order_id')->on('orders')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->foreign('product_id', 'fk_order_products_products')
                  ->references('product_id')->on('products')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->foreign('tax_id', 'fk_order_products_taxes')
                  ->references('tax_id')->on('taxes')
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
