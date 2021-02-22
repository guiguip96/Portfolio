<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreerTableRecruteur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruteur', function (Blueprint $table) {
            $table->id();
            $table->string('prenom', 25);
            $table->string('nom', 25);
            $table->string('adresse', 40);
            $table->string('codePostal', 6);
            $table->string('ville', 25);
            $table->string('telephone', 15);
            $table->string('courriel', 40);
            $table->string('compagnie', 40);
            $table->unsignedBigInteger('idUser');

            $table->foreign('idUser')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recruteur');
    }
}
