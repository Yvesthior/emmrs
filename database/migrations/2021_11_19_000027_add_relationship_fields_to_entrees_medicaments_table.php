<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEntreesMedicamentsTable extends Migration
{
    public function up()
    {
        Schema::table('entrees_medicaments', function (Blueprint $table) {
            $table->unsignedBigInteger('medicament_id');
            $table->foreign('medicament_id', 'medicament_fk_5006446')->references('id')->on('medicaments');
            $table->unsignedBigInteger('provenance_id')->nullable();
            $table->foreign('provenance_id', 'provenance_fk_5006449')->references('id')->on('fournisseurs');
            $table->unsignedBigInteger('conditonnement_id')->nullable();
            $table->foreign('conditonnement_id', 'conditonnement_fk_5006450')->references('id')->on('conditionnements');
            $table->unsignedBigInteger('fabriquant_id')->nullable();
            $table->foreign('fabriquant_id', 'fabriquant_fk_5006456')->references('id')->on('fabriquants');
            $table->unsignedBigInteger('destination_id')->nullable();
            $table->foreign('destination_id', 'destination_fk_5006457')->references('id')->on('sites');
        });
    }
}
