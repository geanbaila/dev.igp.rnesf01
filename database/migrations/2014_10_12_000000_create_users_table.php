<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('name')->nullable();
            $table->string('sigla')->nullable();
            $table->string('ruc')->nullable()->unique();
            $table->string('document')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('password');

            $table->string('manager_name')->nullable();
            $table->string('manager_document')->nullable();
            $table->string('manager_email')->nullable();

            $table->unsignedTinyInteger('user_type')->default(2);  // 1: user, 2 institution

            $table->boolean('verified')->default(0);
            $table->string('verifiable_token')->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('users');
    }
}
