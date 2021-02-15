<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreerTableRealisation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realisation', function (Blueprint $table) {
            $table->id();
            $table->string('nomRealisation', 25);
            $table->string('description', 25);
            $table->float('idEtudiant', 10);
            $table->float('idCompetence', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realisation');
    }
}
