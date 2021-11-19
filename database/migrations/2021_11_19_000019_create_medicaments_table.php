<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentsTable extends Migration
{
    public function up()
    {
        Schema::create('medicaments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('identifiant');
            $table->string('designation');
            $table->string('lot');
            $table->string('type');
            $table->string('dci')->nullable();
            $table->integer('upc')->nullable();
            $table->integer('nombre_conditionnement')->nullable();
            $table->integer('total_unites')->nullable();
            $table->integer('prix_unitaire')->nullable();
            $table->integer('prix_total')->nullable();
            $table->date('date_peremption')->nullable();
            $table->date('date_reception')->nullable();
            $table->string('observation')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
