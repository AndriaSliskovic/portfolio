<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjektiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projektis', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('naslov');
            $table->text('slug');
            $table->text('podnaslov');
            $table->longText('sadrzaj');
            $table->integer('tag_id')->nullable();
            $table->integer('category_id')->unsigned();
            $table->date('vremeIzrade')->nullable();
            $table->integer('skill')->nullable();
            $table->string('slika')->nullable();
            $table->string('linkProjekta')->nullable();
            $table->string('linkGitHuba')->nullable();
            $table->string('test')->nullable();
            $table->timestamps();

            // Definisanje stranog kljuca prema funkcionalnosti ONE to MANY
            $table->foreign('category_id')
                ->references('id')->on('categories')
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
        Schema::dropIfExists('projekti');
    }
}
