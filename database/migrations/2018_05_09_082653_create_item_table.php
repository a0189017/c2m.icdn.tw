<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('item_id');
            $table->string('item_name')->nullable();
            $table->decimal('amount', 8, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('item_metas', function (Blueprint $table) {
            $table->bigIncrements('item_meta_id');
            $table->bigInteger('item_id');
            $table->string('meta_key');
            $table->longtext('meta_value')->nullable();
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
        // Schema::dropIfExists('items');
        // Schema::dropIfExists('item_metas');
    }
}
