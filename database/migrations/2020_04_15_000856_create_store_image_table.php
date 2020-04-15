<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_image', function (Blueprint $table) {
          $table->unsignedBigInteger('store_id');
          $table->unsignedBigInteger('image_id');
          $table->primary(['store_id', 'image_id']);

          //外部キー制約
          $table->foreign('store_id')
                ->references('id')
                ->on('stores')
                ->onDelete('cascade');
          $table->foreign('image_id')
                ->references('id')
                ->on('images')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_image');
    }
}
