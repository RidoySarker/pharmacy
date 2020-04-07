<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegularTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regular_transactions', function (Blueprint $table) {
            $table->increments('regular_transaction_id');
            $table->string('date');
            $table->string('whole_sale_cost');
            $table->string('whole_sale_payment');
            $table->string('retail_sale_cost');
            $table->string('retail_sale_payment');
            $table->string('expense');
            $table->string('cash');
            $table->string('due');
            $table->string('in_cash');
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
        Schema::dropIfExists('regular_transactions');
    }
}
