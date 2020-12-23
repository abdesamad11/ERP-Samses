<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('email');
            $table->string('tele');
            $table->string('adresse');
            $table->string('experiecne');
            $table->date('date_embouche');
            $table->string('cin');
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            $table->string('photo');
            $table->string('salaire');
            $table->integer('conger');
            $table->string('RIB');
            $table->string('ville');
            $table->string('affectation');
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
        Schema::dropIfExists('employers');
    }
}
