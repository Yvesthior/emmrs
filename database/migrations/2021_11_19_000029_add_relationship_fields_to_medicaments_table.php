<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMedicamentsTable extends Migration
{
    public function up()
    {
        Schema::table('medicaments', function (Blueprint $table) {
            $table->unsignedBigInteger('forme_id')->nullable();
            $table->foreign('forme_id', 'forme_fk_5006076')->references('id')->on('formes');
            $table->unsignedBigInteger('dosage_id')->nullable();
            $table->foreign('dosage_id', 'dosage_fk_5006077')->references('id')->on('dosages');
            $table->unsignedBigInteger('conditionnement_id')->nullable();
            $table->foreign('conditionnement_id', 'conditionnement_fk_5006078')->references('id')->on('conditionnements');
            $table->unsignedBigInteger('classe_therapeutique_id')->nullable();
            $table->foreign('classe_therapeutique_id', 'classe_therapeutique_fk_5005993')->references('id')->on('classe_therapeutiques');
            $table->unsignedBigInteger('fabriquant_id')->nullable();
            $table->foreign('fabriquant_id', 'fabriquant_fk_5005994')->references('id')->on('fabriquants');
            $table->unsignedBigInteger('formule_id')->nullable();
            $table->foreign('formule_id', 'formule_fk_5005995')->references('id')->on('formules');
            $table->unsignedBigInteger('famille_id')->nullable();
            $table->foreign('famille_id', 'famille_fk_5005996')->references('id')->on('familles');
            $table->unsignedBigInteger('provenance_id')->nullable();
            $table->foreign('provenance_id', 'provenance_fk_5005998')->references('id')->on('sites');
            $table->unsignedBigInteger('fournisseur_id')->nullable();
            $table->foreign('fournisseur_id', 'fournisseur_fk_5005999')->references('id')->on('fournisseurs');
            $table->unsignedBigInteger('destination_id')->nullable();
            $table->foreign('destination_id', 'destination_fk_5006000')->references('id')->on('sites');
            $table->unsignedBigInteger('reference_id')->nullable();
            $table->foreign('reference_id', 'reference_fk_5006001')->references('id')->on('references');
        });
    }
}
