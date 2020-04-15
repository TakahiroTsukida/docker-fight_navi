<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_price', function (Blueprint $table) {
          $table->unsignedBigInteger('shop_id');
          $table->unsignedBigInteger('price_id');
          $table->primary(['shop_id', 'price_id']);

          //外部キー制約
          $table->foreign('shop_id')
                ->references('id')
                ->on('shops')
                ->onDelete('cascade');
          $table->foreign('price_id')
                ->references('id')
                ->on('prices')
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
        Schema::dropIfExists('shop_price');
    }
}
