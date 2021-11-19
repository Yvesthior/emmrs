<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSortiesTable extends Migration
{
    public function up()
    {
        Schema::create('sorties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantite');
            $table->date('date_sortie');
            $table->string('rubrique');
            $table->string('observation')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
