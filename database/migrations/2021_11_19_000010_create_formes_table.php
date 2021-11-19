<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormesTable extends Migration
{
    public function up()
    {
        Schema::create('formes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('designation');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
