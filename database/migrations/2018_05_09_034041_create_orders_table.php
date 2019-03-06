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
            $table->bigIncrements('order_id');
            $table->string('order_id_ha')->nullable();
            $table->integer('user_id');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE orders AUTO_INCREMENT = 14000;");

        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('order_items_id');
            $table->bigInteger('order_id');
            $table->integer('order_item_id');
            $table->string('order_item_name');
            $table->timestamps();
        });

        Schema::create('order_metas', function (Blueprint $table) {
            $table->bigIncrements('order_meta_id');
            $table->bigInteger('order_id');
            $table->string('meta_key');
            $table->longtext('meta_value')->nullable();
            $table->dateTime('created_at');
        });

        Schema::create('order_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('order_id');
            $table->string('payment_name')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('payment_amount')->nullable();
            $table->string('payment_invoice')->nullable();
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
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('order_metas');
        Schema::dropIfExists('order_payments');
    }
}
