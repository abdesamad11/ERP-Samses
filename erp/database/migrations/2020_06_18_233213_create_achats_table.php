<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('achats', function (Blueprint $table) {
            $table->id();
            $table->string('no_commande')->nullable();
            $table->foreignId('fournisseur_id')->constrained();
            $table->date('date_achat')->nullable();
            $table->string('name')->nullable();
            $table->string('qte')->nullable();
            $table->string('prix')->nullable();
            $table->double('total')->nullable();
            $table->double('rest')->nullable();
            $table->boolean('active')->default(0);
            $table->enum('status',['commander','recu']);
            $table->text('remarque');
            $table->softDeletes();
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
        Schema::dropIfExists('achats');
    }
}
