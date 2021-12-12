<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classroom_courses', function (Blueprint $table) {
            $table->id();
            $table->integer('course_category_id');
            $table->integer('main_category_id');
            $table->string('classroom_course_image');
            $table->string('classroom_course_title');
            $table->integer('exam_fee');
            $table->integer('training_fee');
             $table->string('classroom_slug')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('classroom_courses');
    }
}
