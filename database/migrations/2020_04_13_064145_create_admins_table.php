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
          $table->string('gender');
          $table->date('birthday');
          $table->string('email')->unique();
          $table->timestamp('email_verified_at')->nullable();
          $table->string('password');

          $table->string('company_name');
          $table->string('tel')->nullable();
          $table->string('address_number');
          $table->string('address_ken');
          $table->string('address_city');
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
