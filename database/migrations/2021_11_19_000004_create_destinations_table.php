<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationsTable extends Migration
{
    public function up()
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->integer('budget_global')->nullable();
            $table->integer('solde');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
