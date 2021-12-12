<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_blog_id')->nullable();
            $table->string('blog_banner_image')->nullable();
            $table->string('sub_title')->nullable();
            $table->longText('sub_title_description')->nullable();
            $table->string('blog_content_img1')->nullable();
            $table->string('youtube_url_1')->nullable();
            $table->string('blog_content_img2')->nullable();
            $table->longText('blog_details_content')->nullable();
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
        Schema::dropIfExists('blog_details');
    }
}
