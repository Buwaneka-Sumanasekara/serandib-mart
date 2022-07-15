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
        Schema::create('pm_permissions', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('parent_id');
            $table->string('name',200);
            $table->text('description')->nullable();
            $table->tinyInteger('is_ui')->default('0');
            $table->string('display_name',100)->nullable()->default("");
            $table->string('url_path',100)->nullable()->default("");
            $table->string('icon',20);
            $table->integer('order_no')->default(0);
            $table->timestamps();
        });

        Schema::table('pm_permissions',function (Blueprint $table){
            $table->foreign('parent_id')->references('id')->on('pm_permissions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pm_permissions');
    }
};
