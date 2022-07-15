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
        Schema::create('cm_customer', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->integer('no_of_orders')->default(0);
            $table->double('total_order_value',10,2)->default(0);
            $table->bigInteger('um_user_id');
            $table->foreign('um_user_id')->references('id')->on('um_user');
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
        Schema::dropIfExists('cm_customer');
    }
};
