<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameters', function (Blueprint $table) {
            $table->id();
            //ENTREPRISE
            $table->string('raison_sociale')->nullable();
            $table->string('nom_societe')->nullable();

            $table->string('RC_soc')->nullable();
            $table->string('IF_soc')->nullable();
            $table->string('patente_soc')->nullable();
            $table->string('cnss_soc')->nullable();
            $table->string('ICE_soc')->nullable();
            $table->string('capitale_soc')->nullable();

            $table->integer('taille_soc')->nullable();
            $table->string('secteur_activite_soc')->nullable();
            // DETAILS BANCAIRE
            $table->string('nom_bank_soc')->nullable();
            $table->string('RIB_soc')->nullable();

            //CONTACT
            $table->string('adresse')->nullable();
            $table->string('email')->nullable();
            $table->string('GSM')->nullable();

            $table->string('fax')->nullable();
            $table->string('webSite')->nullable();
            $table->string('logo')->nullable();

            //autres
            $table->integer('cp')->nullable();
            $table->string('ville')->nullable();
            $table->string('pays')->nullable();
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
        Schema::dropIfExists('parameters');
    }
}
