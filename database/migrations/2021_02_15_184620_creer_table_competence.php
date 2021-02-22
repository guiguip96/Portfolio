<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreerTableCompetence extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competence', function (Blueprint $table) {
            $table->id();
            $table->string('nomCompetence', 25);
            $table->string('description', 25);
            $table->unsignedBigInteger('idEtudiant');

            $table->foreign('idEtudiant')->references('id')->on('etudiant');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competence');
    }
}
