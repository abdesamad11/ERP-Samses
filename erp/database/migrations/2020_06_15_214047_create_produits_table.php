<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('reference_prod')->unique()->nullable();
            $table->foreignId('cat_id')->constrained('categories')->onDelete('cascade');
           // $table->string('type_prod')->nullable();
            $table->string('name')->nullable();
            $table->text('designation')->nullable();
            $table->double('prix_ht_achat')->nullable();
            $table->double('prix_ht_vente')->nullable();
            $table->string('unite')->nullable();
            $table->integer('poid')->nullable();
            $table->double('quantite_init')->nullable();
            $table->double('quantite_rest')->nullable();
            $table->date('date_entree')->nullable();
            $table->string('photo_prod')->nullable();
            $table->double('tva')->nullable();
            $table->string('emplacement')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');

    }
}
