<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurcasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purcases', function (Blueprint $table) {
            $table->increments('purcase_id');
            $table->string('batch_id');
            $table->string('date',50);
            $table->string('expire_date',50);
            $table->string('company_name',50);
            $table->string('medicine_code',50);
            $table->string('quantity',50);
            $table->string('sub_total',50);
            $table->string('grand_total',50);
            $table->string('pay',50);
            $table->string('rest',50);
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
        Schema::dropIfExists('purcases');
    }
}
