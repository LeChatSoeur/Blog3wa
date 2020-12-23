<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slugs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('slug', 50)->unique();
            $table->string('nameNav', 50)->unique();
            $table->unsignedBigInteger('orderNav_id')->nullable();
            $table->unsignedBigInteger('child_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('posts');
        Schema::dropIfExists('choice_layouts');
        Schema::dropIfExists('choice_contents');
        Schema::dropIfExists('slugs');
    }
}
