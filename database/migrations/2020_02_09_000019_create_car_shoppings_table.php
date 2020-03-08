<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarShoppingsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'car_shoppings';

    /**
     * Run the migrations.
     * @table car_shopping
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('car_shop_id');
            $table->unsignedInteger('product_id');
            $table->string('username', 10);
            $table->unsignedInteger('quantity');

            $table->index(["product_id"], 'fk_car_shopping_products_idx');

            $table->index(["username"], 'fk_car_shopping_user_idx');


            $table->foreign('product_id', 'fk_car_shopping_products')
                  ->references('product_id')->on('products')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->foreign('username', 'fk_car_shopping_user')
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
