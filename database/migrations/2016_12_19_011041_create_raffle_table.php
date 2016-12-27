<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaffleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raffle', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prefix',5);
            $table->string('obj_name');
            $table->integer('obj_cost');
            $table->integer('ticket_cost');
            $table->string('raffle_images_path');
            $table->dateTime('closing_date');
            $table->enum('status',['open','closed'])->default('open');
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
        Schema::drop('raffle');
    }
}
