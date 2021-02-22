<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreerTableEnregistrement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enregistrement', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idRecruteur');
            $table->unsignedBigInteger('idCompetence');

            $table->foreign('idRecruteur')->references('id')->on('recruteur');
            $table->foreign('idCompetence')->references('id')->on('competence');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enregistrement');
    }
}
