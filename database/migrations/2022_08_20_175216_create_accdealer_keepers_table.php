<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccdealerKeepersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accdealer_keepers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('acdealer_id')->unsigned();
            $table->foreign('acdealer_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('keeper_id')->unsigned();
            $table->foreign('keeper_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('accessoryId')->unsigned();
            $table->foreign('accessoryId')->references('id')->on('accessories');
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
        Schema::dropIfExists('accdealer_keepers');
    }
}
