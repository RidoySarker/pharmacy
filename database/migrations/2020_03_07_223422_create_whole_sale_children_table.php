<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWholeSaleChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whole_sale_children', function (Blueprint $table) {
            $table->increments('whole_sale_child_id');
            $table->string('date');
            $table->string('patient_name');
            $table->string('invoice_id');
            $table->string('grand_total');
            $table->string('payment');
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
        Schema::dropIfExists('whole_sale_children');
    }
}
