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
        Schema::create('phuongs', function (Blueprint $table) {
            $table->increments('id');
            $table->String('TenPhuong');
            $table->integer('quan_id')->unsigned();
            $table->timestamps();
            $table->foreign('quan_id')->references('id')->on('quans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phuongs');
    }
};
