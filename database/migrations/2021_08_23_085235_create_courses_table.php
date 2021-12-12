<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->integer('course_category_id');
            $table->integer('main_category_id');
            $table->string('preview_id')->nullable();
            $table->integer('video_type')->nullable();
            $table->string('accredation_name')->nullable();
            $table->string('course_image');
            $table->string('course_title');
            $table->string('elearning_slug')->nullable();
            $table->integer('regular_price');
            $table->integer('sale_price');
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
        Schema::dropIfExists('courses');
    }
}
