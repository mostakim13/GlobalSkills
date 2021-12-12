<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classroom_trainers', function (Blueprint $table) {
      $table->increments('id');
         $table->integer('classroom_course_id')->nullable();
         $table->string('image')->nullable();
         $table->string('name');
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
        Schema::dropIfExists('classroom_trainers');
    }
}
