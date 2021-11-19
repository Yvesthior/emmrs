<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncrementationMaterielsTable extends Migration
{
    public function up()
    {
        Schema::create('incrementation_materiels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantite')->nullable();
            $table->date('date')->nullable();
            $table->integer('prix_unitaire')->nullable();
            $table->string('date_peremption')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
