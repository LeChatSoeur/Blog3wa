<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_images', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->unsignedBigInteger('post_id')->nullable();
            $table->foreign('post_id')->references('id')
                ->on('posts')->onDelete('cascade');
            $table->unsignedBigInteger('choiceLayout_id')->nullable();
            $table->foreign('choiceLayout_id')->references('id')
                ->on('choice_layouts')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upload_images');
    }
}
