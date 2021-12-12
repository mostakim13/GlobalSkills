<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_courses', function (Blueprint $table) {
            $table->id();
            $table->integer('main_category_id')->nullable();
            $table->integer('course_category_id')->nullable();
            $table->string('course_title');
            $table->string('image')->nullable();
            $table->integer('training_fee');
            $table->string('short_description')->nullable();
            $table->string('course_description')->nullable();
            $table->string('learning_outcomes')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('training_courses');
    }
}
