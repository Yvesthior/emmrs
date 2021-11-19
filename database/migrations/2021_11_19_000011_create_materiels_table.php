<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterielsTable extends Migration
{
    public function up()
    {
        Schema::create('materiels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lot')->nullable();
            $table->string('id_unique')->nullable();
            $table->string('code');
            $table->string('identifiant');
            $table->string('designation');
            $table->date('date_inventaire')->nullable();
            $table->float('quantite')->nullable();
            $table->string('marque');
            $table->string('modele');
            $table->string('numero_serie');
            $table->integer('prix_unitaire')->nullable();
            $table->float('prix_total')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
