<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_cart', function (Blueprint $table) {
            
            $table->increments('id_item_cart');
            $table->integer('quantity');
            $table->decimal('total_price',10,2);
            $table->integer('id_product')->unsigned();
            $table->integer('id_shopping_cart')->unsigned();

            $table->foreign('id_product')->references('id_product')->on('products');
            $table->foreign('id_shopping_cart')->references('id_shopping_cart')->on('shopping_cart');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_cart');
    }
}
