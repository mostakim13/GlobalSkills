<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classroom_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('classroom_course_id')->nullable();
            $table->string('classroom_short_description')->nullable();
            $table->string('classroom_course_description')->nullable();
            $table->string('classroom_certification')->nullable();
            $table->string('classroom_learning_outcomes')->nullable();
            $table->string('classroom_banner_image')->nullable();
            $table->integer('classroom_instructor_id')->nullable();
            $table->integer('pass_mark')->nullable();
            $table->integer('out_of')->nullable();
            $table->integer('no_of_questions')->nullable();
            $table->string('exam_type')->nullable();
            $table->integer('duration')->nullable();
            $table->string('book')->nullable();
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
        Schema::dropIfExists('classroom_infos');
    }
}
