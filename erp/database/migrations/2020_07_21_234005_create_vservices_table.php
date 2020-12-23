<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vservices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clients_id')->constrained('clients')->onDelete('cascade');
            $table->date('date_ser')->nullable();
            $table->string('num_vs')->unique()->nullable();
            $table->text('remarque')->nullable();
            $table->double('total')->nullable();
            $table->double('rest')->nullable();
            $table->boolean('active')->default(0);
            $table->enum('status',['encoure','vente']);
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
        Schema::dropIfExists('vservices');
    }
}
