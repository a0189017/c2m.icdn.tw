<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designs', function (Blueprint $table) {
            $table->bigIncrements('design_id');
            $table->bigInteger('item_id');
            $table->dateTime('created_at');	
        });

        Schema::create('design_metas', function (Blueprint $table) {
            $table->bigIncrements('design_meta_id');
            $table->bigInteger('design_id');
            $table->string('meta_key')->nullable();
            $table->longtext('meta_value')->nullable();
            $table->dateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('designs');
        Schema::dropIfExists('design_metas');
    }
}
