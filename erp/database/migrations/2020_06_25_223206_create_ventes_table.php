<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clients_id')->constrained('clients')->onDelete('cascade');
            $table->date('date_v')->nullable();
            $table->string('name_prv')->nullable();
            $table->boolean('bon_livr')->default(0);
            $table->string('num_facture')->nullable();
            $table->string('num_bl')->nullable();
            $table->text('remarque')->nullable();
            $table->double('total')->nullable();
            $table->double('rest')->nullable();
            $table->boolean('active')->default(0);
            $table->enum('status',['Vente','encoure']);
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
        Schema::dropIfExists('ventes');
    }
}
