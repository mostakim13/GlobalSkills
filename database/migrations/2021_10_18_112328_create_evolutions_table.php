<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evolutions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('course_id');
            $table->integer('trainer_id');

            $table->string('company_name');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('reason')->nullable();
            $table->string('trainers_competence');
            $table->string('experience');
            $table->string('presentation');
            $table->string('material');
            $table->string('usefullness');
            $table->string('satisfaction');
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
        Schema::dropIfExists('evolutions');
    }
}
