<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReglementAchatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reglement_achats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('achat_id')->constrained();
            $table->string('Mode')->nullable();
            $table->string('numero')->unique()->nullable();
            $table->date('date_reglemant')->nullable();
            $table->text('remarque')->nullable();
            $table->double('Montant')->nullable();
            $table->boolean('valide')->default(0);
            $table->date('echeance');
            $table->double('nrest');
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
        Schema::dropIfExists('reglement_achats');
    }
}
