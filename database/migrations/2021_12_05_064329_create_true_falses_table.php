<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrueFalsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('true_falses', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('question');
            $table->string('option1');
            $table->string('option2');
            $table->string('answer');
            $table->string('userans')->nullable();
            $table->string('timer')->default('03:00');
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
        Schema::dropIfExists('true_falses');
    }
}
