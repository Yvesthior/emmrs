<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToIncrementationMaterielsTable extends Migration
{
    public function up()
    {
        Schema::table('incrementation_materiels', function (Blueprint $table) {
            $table->unsignedBigInteger('materiel_id')->nullable();
            $table->foreign('materiel_id', 'materiel_fk_5372279')->references('id')->on('materiels');
            $table->unsignedBigInteger('provenance_id')->nullable();
            $table->foreign('provenance_id', 'provenance_fk_5371642')->references('id')->on('fournisseurs');
            $table->unsignedBigInteger('fabriquant_id')->nullable();
            $table->foreign('fabriquant_id', 'fabriquant_fk_5371645')->references('id')->on('fabriquants');
            $table->unsignedBigInteger('destination_id')->nullable();
            $table->foreign('destination_id', 'destination_fk_5371646')->references('id')->on('sites');
        });
    }
}
