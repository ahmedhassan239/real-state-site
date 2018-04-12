<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bu_name',100);
            $table->string('bu_price',20);
            $table->tinyInteger('rooms');
            $table->tinyInteger('bu_rent');
            $table->string('bu_square');
            $table->tinyInteger('bu_type');
            $table->string('bu_small_dis',160);
            $table->string('bu_meta',200);
            $table->string('bu_langtuide',50);
            $table->string('bu_latitde',50);
            $table->longText('bu_large_dis');
            $table->tinyInteger('bu_status');
            $table->string('image',300); //made hard coded
            $table->integer('bu_place');
            $table->tinyInteger('user_id');
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
        Schema::dropIfExists('bu');
    }
}
