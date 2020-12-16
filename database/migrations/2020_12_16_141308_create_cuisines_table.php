<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuisinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuisines', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
        });

        Schema::create('keywords', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('cuisine_keyword', function (Blueprint $table) {
            $table->integer('cuisine_id');
            $table->integer('keyword_id');
            $table->index([
                'cuisine_id',
                'keyword_id',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuisines');
    }
}
