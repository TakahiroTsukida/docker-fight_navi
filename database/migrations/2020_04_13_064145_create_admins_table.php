<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');
          $table->string('gender')->nullable();
          $table->date('birthday')->nullable();
          $table->string('email')->unique();
          $table->timestamp('email_verified_at')->nullable();
          $table->string('password');

          $table->string('company_name')->nullable();
          $table->string('tel')->nullable();
          $table->string('address_number')->nullable();
          $table->string('address_ken')->nullable();
          $table->string('address_city')->nullable();
          $table->string('web')->nullable();

          $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}
