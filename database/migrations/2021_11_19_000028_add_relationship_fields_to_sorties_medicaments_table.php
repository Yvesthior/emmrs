<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSortiesMedicamentsTable extends Migration
{
    public function up()
    {
        Schema::table('sorties_medicaments', function (Blueprint $table) {
            $table->unsignedBigInteger('medicament_id');
            $table->foreign('medicament_id', 'medicament_fk_5006362')->references('id')->on('medicaments');
            $table->unsignedBigInteger('destination_id')->nullable();
            $table->foreign('destination_id', 'destination_fk_5006368')->references('id')->on('destinations');
        });
    }
}
