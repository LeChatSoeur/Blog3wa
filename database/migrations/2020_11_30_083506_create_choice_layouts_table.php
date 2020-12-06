<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChoiceLayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choice_layouts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('content_width', 30);
            $table->string('header_image', 255)->nullable();
            $table->string('header_height', 6)->nullable();
            $table->string('title', 255)->nullable();
            $table->unsignedBigInteger('slug_id')->index();
            $table->foreign('slug_id')
                ->references('id')
                ->on('slugs')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('choice_layouts');
    }
}
