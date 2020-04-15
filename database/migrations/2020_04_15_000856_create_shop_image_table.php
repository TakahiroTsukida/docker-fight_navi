<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_image', function (Blueprint $table) {
          $table->unsignedBigInteger('shop_id');
          $table->unsignedBigInteger('image_id');
          $table->primary(['shop_id', 'image_id']);

          //外部キー制約
          $table->foreign('shop_id')
                ->references('id')
                ->on('shops')
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
        Schema::dropIfExists('shop_image');
    }
}
