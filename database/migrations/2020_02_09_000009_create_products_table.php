<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'products';

    /**
     * Run the migrations.
     * @table products
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('category_id', 25);
            $table->unsignedInteger('currency_code_id');
            $table->string('product_name', 40);
            $table->double('price', 11, 2);
            $table->unsignedInteger('discount');
            $table->string('unit', 10);
            $table->unsignedInteger('stock_cant');

            $table->index(["category_id"], 'fk_products_categories_idx');

            $table->index(["currency_code_id"], 'fk_products_currency_codes_idx');


            $table->foreign('category_id', 'fk_products_categories')
                  ->references('category_id')->on('categories')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->foreign('currency_code_id', 'fk_products_currency_codes')
                  ->references('currency_code_id')->on('currency_codes')
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
