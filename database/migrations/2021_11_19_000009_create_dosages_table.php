<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosagesTable extends Migration
{
    public function up()
    {
        Schema::create('dosages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('quantite')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
