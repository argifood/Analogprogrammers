<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Stats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statshours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedBigInteger('areacodes_id');
            $table->foreign('areacodes_id')->references('id')->on('areacodes');
            $table->double('totalamount', 15, 2);
            $table->double('minprice', 15, 2);
            $table->double('maxprice', 15, 2);
            $table->double('meanprice', 15, 2);
        });
        Schema::create('statsdays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedBigInteger('areacodes_id');
            $table->foreign('areacodes_id')->references('id')->on('areacodes');
            $table->double('totalamount', 15, 2);
            $table->double('minprice', 15, 2);
            $table->double('maxprice', 15, 2);
            $table->double('meanprice', 15, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statshour');
        Schema::dropIfExists('statsday');

    }
}
