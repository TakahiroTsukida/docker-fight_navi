<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('admin_id');
            $table->string('name');
            $table->string('tel', 11)->nullable();
            $table->string('address_number')->nullable();
            $table->string('address_ken');
            $table->string('address_city');
            $table->string('address_other')->nullable();
            $table->string('open')->nullable();
            $table->string('close')->nullable();
            $table->string('web')->nullable();
            $table->string('trial');
            $table->string('trial_price')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('shops');
    }
}
