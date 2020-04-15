<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_type', function (Blueprint $table) {
          $table->unsignedBigInteger('store_id');
          $table->unsignedBigInteger('type_id');
          $table->primary(['store_id', 'type_id']);

          //外部キー制約
          $table->foreign('store_id')
                ->references('id')
                ->on('stores')
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
        Schema::dropIfExists('store_type');
    }
}
