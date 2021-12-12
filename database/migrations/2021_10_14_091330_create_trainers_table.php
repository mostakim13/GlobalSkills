<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('course_id')->nullable();
          $table->integer('classroom_course_id')->nullable();
          $table->integer('trainer_id')->nullable();
          $table->string('image')->nullable();
          $table->string('name')->nullable();
          $table->string('signature')->nullable();
          $table->string('designation')->nullable();
          $table->string('facebook_profile')->nullable();
          $table->string('linkdin_profile')->nullable();
          $table->longText('biography')->nullable();
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
        Schema::dropIfExists('trainers');
    }
}
