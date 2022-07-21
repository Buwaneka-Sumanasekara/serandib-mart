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
        Schema::create('sm_stock', function (Blueprint $table) {
            $table->string('id',200)->primary();
            $table->string('sm_product_id',100);
            $table->integer('batch');
            $table->string('unique_name',500);
            $table->double('cost_price', 8, 2);
            $table->double('sell_price', 8, 2);
            $table->tinyInteger('active')->default('1');
            $table->double('stock_in_hand', 8, 2);
            $table->dateTime('exp_date');//UTC
            $table->string('barcode',200);
            $table->foreign('sm_product_id')->references('id')->on('sm_product');
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
        Schema::dropIfExists('sm_stock');
    }
};
