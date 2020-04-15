<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopPersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_personal', function (Blueprint $table) {
          $table->unsignedBigInteger('shop_id');
          $table->unsignedBigInteger('personal_id');
          $table->primary(['shop_id', 'personal_id']);

          //外部キー制約
          $table->foreign('shop_id')
                ->references('id')
                ->on('shops')
                ->onDelete('cascade');
          $table->foreign('personal_id')
                ->references('id')
                ->on('personals')
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
        Schema::dropIfExists('shop_personal');
    }
}
