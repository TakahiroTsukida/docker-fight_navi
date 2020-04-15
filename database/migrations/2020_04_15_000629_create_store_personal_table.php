<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStorePersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_personal', function (Blueprint $table) {
          $table->unsignedBigInteger('store_id');
          $table->unsignedBigInteger('personal_id');
          $table->primary(['store_id', 'personal_id']);

          //外部キー制約
          $table->foreign('store_id')
                ->references('id')
                ->on('stores')
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
        Schema::dropIfExists('store_personal');
    }
}
