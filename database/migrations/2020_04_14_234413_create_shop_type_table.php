<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_type', function (Blueprint $table) {
          $table->unsignedBigInteger('shop_id');
          $table->unsignedBigInteger('type_id');
          $table->primary(['shop_id', 'type_id']);

          //外部キー制約
          $table->foreign('shop_id')
                ->references('id')
                ->on('shops')
                ->onDelete('cascade');
          $table->foreign('type_id')
                ->references('id')
                ->on('types')
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
        Schema::dropIfExists('shop_type');
    }
}
