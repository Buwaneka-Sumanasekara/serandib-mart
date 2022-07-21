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
        Schema::create('sm_product_group_link', function (Blueprint $table) {

            $table->integer('sm_product_group1_id');
            $table->integer('sm_product_group2_id');
            $table->integer('sm_product_group3_id');
            $table->tinyInteger('active')->default('1');
            $table->timestamps();

            $table->primary(['sm_product_group1_id', 'sm_product_group2_id','sm_product_group3_id'],"sm_product_group_group_id");

            $table->foreign('sm_product_group1_id')->references('id')->on('sm_product_group1');
            $table->foreign('sm_product_group2_id')->references('id')->on('sm_product_group2');
            $table->foreign('sm_product_group3_id')->references('id')->on('sm_product_group3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sm_product_group_link');
    }
};
