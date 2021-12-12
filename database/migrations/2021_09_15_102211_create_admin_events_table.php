<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_events', function (Blueprint $table) {
            $table->id();
            $table->string('event_title')->nullable();
            $table->integer('date')->nullable();
            $table->string('month')->nullable();
            $table->string('description')->nullable();
            $table->string('event_image')->nullable();
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
        Schema::dropIfExists('admin_events');
    }
}
