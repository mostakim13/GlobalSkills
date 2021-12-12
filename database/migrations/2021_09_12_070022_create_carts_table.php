<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('course_id')->nullable();
            $table->unsignedInteger('order_id')->nullable();
            $table->integer('course_quantity')->default(1);
            $table->integer('classroom_course_quantity')->default(1)->nullable();
            $table->unsignedInteger('classroom_course_id')->nullable();
            $table->string('ip_address')->nullable();



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
        Schema::dropIfExists('carts');
    }
}
