<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHdealerKeepersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hdealer_keepers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('hdealer_id')->unsigned();
            $table->foreign('hdealer_id')->references('id')->on('users');
            $table->bigInteger('keeper_id')->unsigned();
            $table->foreign('keeper_id')->references('id')->on('users');
            $table->bigInteger('productId')->unsigned();
            $table->foreign('productId')->references('id')->on('hproducts');
            // $table->integer('keeper_price');
            $table->integer('offered_price');
            $table->integer('amout');
            $table->tinyInteger('status')->default('0');
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
        Schema::dropIfExists('hdealer_keepers');
    }
}
