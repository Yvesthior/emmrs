<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepresentantsLocauxesTable extends Migration
{
    public function up()
    {
        Schema::create('representants_locauxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
