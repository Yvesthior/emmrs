<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreesMedicamentsTable extends Migration
{
    public function up()
    {
        Schema::create('entrees_medicaments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date')->nullable();
            $table->integer('nombre_conditionnement')->nullable();
            $table->string('upc')->nullable();
            $table->integer('prix_unitaire')->nullable();
            $table->string('date_peremption')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
