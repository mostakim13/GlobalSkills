<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseOverviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_overviews', function (Blueprint $table) {
            $table->id();
            $table->integer('course_category_id')->nullable();
            $table->integer('main_category_id')->nullable();
            $table->integer('course_id');
            $table->string('banner_image');
            $table->string('short_description');
            $table->string('course_description');
            $table->string('learning_outcomes');
            $table->string('certification')->nullable();
            
            $table->string('instructor_id')->nullable();
            $table->string('skill');
            $table->string('language');
            $table->string('quiz');

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
        Schema::dropIfExists('course_overviews');
    }
}
