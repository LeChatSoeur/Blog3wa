<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_regions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pays_id')->nullable();
            $table->foreign('pays_id')->references('id')
                ->on('category_pays');
            schema::enableForeignKeyConstraints();
            $table->timestamps();
            $table->string('title', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_regions');
    }
}
