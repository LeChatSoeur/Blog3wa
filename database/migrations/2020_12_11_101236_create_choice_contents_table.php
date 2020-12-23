<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChoiceContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choice_contents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longText('content');
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
        Schema::dropIfExists('choice__contents');
    }
}
