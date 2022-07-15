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
        Schema::create('um_user', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->string('first_name',100);
            $table->string('mid_name',100)->nullable()->default("");
            $table->string('last_name',100)->nullable()->default("");
            $table->string('email',100)->nullable();
            $table->integer('um_user_status_id');
            $table->integer('um_user_role_id');
            $table->tinyInteger('is_verified')->default(0);
            $table->foreign('um_user_status_id')->references('id')->on('um_user_status');
            $table->foreign('um_user_role_id')->references('id')->on('um_user_role');
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
        Schema::dropIfExists('um_user');
    }
};
