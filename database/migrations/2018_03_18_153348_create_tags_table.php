<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('tag');
            $table->integer('projekat_id')->nullable();
            $table->integer('category_id')->unsigned();
            $table->integer('oblast_id')->unsigned();
            $table->text('opis')->nullable();
            $table->timestamps();

            // Definisanje stranog kljuca prema funkcionalnosti ONE to MANY
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');

            $table->foreign('oblast_id')
                ->references('id')->on('oblasts')
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
        Schema::dropIfExists('tags');
    }
}
