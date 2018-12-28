<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjektiTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projekti_tag', function (Blueprint $table) {
            $table->engine = "InnoDB";

            $table->increments('id');
            //unsigned da ne moze biti negativan broj, index za brze pretrazivanje
            $table->integer('projekti_id')->unsigned()->index();
            //Povezivanje stranih kljuceva
            $table->foreign('projekti_id')->references('id')->on('projektis')->onDelete('cascade');
            $table->integer('tag_id')->unsigned()->index();
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
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
        Schema::dropIfExists('projekti_tag');
    }
}
