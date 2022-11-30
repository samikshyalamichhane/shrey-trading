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
            $table->id()->from(20000);
            $table->string('cart_id')->nullable();
            // $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->double('amount', 15,8);
            $table->text('order_note')->nullable();
            $table->enum('status', ['new', 'verified', 'cancel', 'process', 'delivered'] )->default('new');
            $table->float('delivery_charge')->nullable();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('SET NULL');
            $table->timestamps();
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
