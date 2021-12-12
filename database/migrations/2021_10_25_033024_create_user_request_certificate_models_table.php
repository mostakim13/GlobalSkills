<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRequestCertificateModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_request_certificate_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->integer('phone');
            $table->integer('classroom_course_id');
            $table->integer('trainer_id')->nullable();
            $table->string('company_name')->nullable();
            $table->integer('total_hours');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('reason')->nullable();
            $table->string('trainers_competence');
            $table->string('experience');
            $table->string('presentation');
            $table->string('material');
            $table->string('usefullness');
            $table->string('satisfaction');
            $table->enum('status',['pending','approve'])->default('pending');
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
        Schema::dropIfExists('user_request_certificate_models');
    }
}
