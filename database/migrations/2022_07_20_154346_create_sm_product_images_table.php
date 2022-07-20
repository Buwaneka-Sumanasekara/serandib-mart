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
        Schema::create('sm_product_images', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->string('name',45);
            $table->tinyInteger('active')->default('1');
            $table->string('sm_product_id',100);

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
        Schema::dropIfExists('sm_product_images');
    }
};
