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
        Schema::create('dangtins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Tieude');
            $table->String('Diachi');
            $table->string('Giaphong');
            $table->string('Dientich');
            $table->string('Sdt');
            $table->string('Mota');
            $table->string('Hinhanh');
            $table->string('tiennghi');
            $table->string('soluongphong');
            $table->integer('loaiphong_id')->unsigned();
            $table->integer('phuong_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->boolean('status')->default(0);
            $table->foreign('loaiphong_id')->references('id')->on('loaiphongs');
            $table->foreign('phuong_id')->references('id')->on('phuongs');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('dangtins');
    }
};
