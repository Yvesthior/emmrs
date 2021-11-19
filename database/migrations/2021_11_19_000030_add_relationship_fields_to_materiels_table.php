<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMaterielsTable extends Migration
{
    public function up()
    {
        Schema::table('materiels', function (Blueprint $table) {
            $table->unsignedBigInteger('fabriquant_id');
            $table->foreign('fabriquant_id', 'fabriquant_fk_5005968')->references('id')->on('fabriquants');
            $table->unsignedBigInteger('representant_local_id')->nullable();
            $table->foreign('representant_local_id', 'representant_local_fk_5005969')->references('id')->on('representants_locauxes');
            $table->unsignedBigInteger('provenance_id')->nullable();
            $table->foreign('provenance_id', 'provenance_fk_5005972')->references('id')->on('sites');
            $table->unsignedBigInteger('destination_id')->nullable();
            $table->foreign('destination_id', 'destination_fk_5005973')->references('id')->on('sites');
        });
    }
}
