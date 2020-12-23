<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('type_compte');
            $table->boolean('verifer')->default(0);
            $table->string('nom_cl')->nullable();
            $table->string('raison_social')->nullable();
            $table->string('tele')->nullable();
            $table->string('email')->nullable();
            $table->string('ICE')->nullable();
            $table->string('secteur_activite')->nullable();
            $table->string('adresse_cl')->nullable();
            $table->string('logo')->nullable();
            $table->string('nom_banck')->nullable();
            $table->string('num_compte')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
