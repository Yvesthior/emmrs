<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSortiesTable extends Migration
{
    public function up()
    {
        Schema::table('sorties', function (Blueprint $table) {
            $table->unsignedBigInteger('equipement_id');
            $table->foreign('equipement_id', 'equipement_fk_5006143')->references('id')->on('materiels');
            $table->unsignedBigInteger('destination_id');
            $table->foreign('destination_id', 'destination_fk_5006147')->references('id')->on('sites');
        });
    }
}
