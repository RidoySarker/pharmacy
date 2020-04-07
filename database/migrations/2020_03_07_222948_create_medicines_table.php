<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->increments('medicine_id');
            $table->string('medicine_code',50);
            $table->string('medicine_name',50);
            $table->string('catagory',50);
            $table->string('company_name',50);
            $table->string('desk_name',50);
            $table->string('purcase_price',50);
            $table->string('retail_price',50);
            $table->string('whole_sell_price',50);
            $table->text('medicine_description');
            $table->string('medicine_status');
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
        Schema::dropIfExists('medicines');
    }
}
