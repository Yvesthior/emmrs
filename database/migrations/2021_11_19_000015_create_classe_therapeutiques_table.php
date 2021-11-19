<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasseTherapeutiquesTable extends Migration
{
    public function up()
    {
        Schema::create('classe_therapeutiques', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
