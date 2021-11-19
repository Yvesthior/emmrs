<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSortiesMedicamentsTable extends Migration
{
    public function up()
    {
        Schema::create('sorties_medicaments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_sortie');
            $table->integer('nombre_conditionnement')->nullable();
            $table->integer('total_unite')->nullable();
            $table->integer('upc');
            $table->string('rubrique_sortie');
            $table->string('observation')->nullable();
            $table->integer('cout')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
