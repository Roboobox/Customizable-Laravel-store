<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedDecimal('total', 13, 2);
            $table->string('order_name');
            $table->string('order_surname');
            $table->string('order_email');
            $table->string('order_phone_number', 31);
            $table->string('status', 100);
            $table->timestamps();

            $table->foreignId('user_id')->constrained();
            $table->foreignId('shipping_id')->constrained('order_shippings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
