<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('diachi');
            $table->string('sdt');
            $table->string('gioitinh');
            $table->string('ngaysinh');
            $table->string('Anhdaidien');
            $table->string('Anhbia');
            $table->string('level')->nullable();
            $table->boolean('status')->default(0);
            $table->integer('role_id')->unsigned();
            $table->rememberToken();
            $table->foreign('role_id')->references('id')->on('roles');
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
        Schema::dropIfExists('users');
    }
};
