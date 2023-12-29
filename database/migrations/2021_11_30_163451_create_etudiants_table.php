<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('matricule');
            $table->string('nom');
            $table->string('prenoms');
            $table->string('filiere')->nullable();
            $table->string('niveau')->nullable();
            $table->string('contacts')->nullable();
            $table->string('email')->nullable();

            $table->boolean('restauration')->default(false);
            $table->boolean('cinema')->default(false);
            $table->boolean('entree')->default(false);

            
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
        Schema::dropIfExists('etudiants');
    }
}
