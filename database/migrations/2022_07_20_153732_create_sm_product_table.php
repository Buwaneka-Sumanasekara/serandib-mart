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
        Schema::create('sm_product', function (Blueprint $table) {
            $table->string('id',100)->primary();
            $table->string('unique_name',300);
            $table->string('name',100);
            $table->text('description');
            $table->string('image_url',100);
            $table->integer('sm_product_group1_id');
            $table->integer('sm_product_group2_id');
            $table->integer('sm_product_group3_id');
            $table->tinyInteger('active')->default('1');
            $table->bigInteger('cr_by');
            $table->bigInteger('updated_by');
            $table->tinyInteger('has_expire_date')->default('0');
            $table->tinyInteger('has_batch')->default('0');

            $table->foreign('cr_by')->references('id')->on('um_user');
            $table->foreign('updated_by')->references('id')->on('um_user');
            $table->foreign('sm_product_group1_id')->references('id')->on('sm_product_group1');
            $table->foreign('sm_product_group2_id')->references('id')->on('sm_product_group2');
            $table->foreign('sm_product_group3_id')->references('id')->on('sm_product_group3');
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
        Schema::dropIfExists('sm_product');
    }
};
