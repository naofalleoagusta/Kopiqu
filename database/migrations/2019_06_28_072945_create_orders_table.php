<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id_order');
            $table->integer('unique_code');
            $table->decimal('amount_to_be_paid',10,2);
            $table->boolean('paid');
            $table->unsignedInteger('id_customer');
            $table->unsignedInteger('id_shopping_cart');
            $table->foreign('id_customer')->references('id_customer')->on('customers');
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
        Schema::dropIfExists('payments');
    }
}
