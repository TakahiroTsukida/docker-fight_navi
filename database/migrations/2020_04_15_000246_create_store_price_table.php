<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStorePriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_price', function (Blueprint $table) {
          $table->unsignedBigInteger('store_id');
          $table->unsignedBigInteger('price_id');
          $table->primary(['store_id', 'price_id']);

          //外部キー制約
          $table->foreign('store_id')
                ->references('id')
                ->on('stores')
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
        Schema::dropIfExists('store_price');
    }
}
