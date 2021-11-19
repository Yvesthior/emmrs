@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.materiel.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.materiels.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.materiel.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $materiel->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.materiel.fields.lot') }}
                                    </th>
                                    <td>
                                        {{ $materiel->lot }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.materiel.fields.id_unique') }}
                                    </th>
                                    <td>
                                        {{ $materiel->id_unique }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.materiel.fields.code') }}
                                    </th>
                                    <td>
                                        {{ $materiel->code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.materiel.fields.identifiant') }}
                                    </th>
                                    <td>
                                        {{ $materiel->identifiant }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.materiel.fields.designation') }}
                                    </th>
                                    <td>
                                        {{ $materiel->designation }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.materiel.fields.date_inventaire') }}
                                    </th>
                                    <td>
                                        {{ $materiel->date_inventaire }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.materiel.fields.quantite') }}
                                    </th>
                                    <td>
                                        {{ $materiel->quantite }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.materiel.fields.marque') }}
                                    </th>
                                    <td>
                                        {{ $materiel->marque }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.materiel.fields.modele') }}
                                    </th>
                                    <td>
                                        {{ $materiel->modele }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.materiel.fields.numero_serie') }}
                                    </th>
                                    <td>
                                        {{ $materiel->numero_serie }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.materiel.fields.fabriquant') }}
                                    </th>
                                    <td>
                                        {{ $materiel->fabriquant->nom ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.materiel.fields.representant_local') }}
                                    </th>
                                    <td>
                                        {{ $materiel->representant_local->nom ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.materiel.fields.prix_unitaire') }}
                                    </th>
                                    <td>
                                        {{ $materiel->prix_unitaire }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.materiel.fields.prix_total') }}
                                    </th>
                                    <td>
                                        {{ $materiel->prix_total }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.materiel.fields.provenance') }}
                                    </th>
                                    <td>
                                        {{ $materiel->provenance->nom ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.materiel.fields.destination') }}
                                    </th>
                                    <td>
                                        {{ $materiel->destination->nom ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.materiels.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#equipement_sorties" aria-controls="equipement_sorties" role="tab" data-toggle="tab">
                            {{ trans('cruds.sorty.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="equipement_sorties">
                        @includeIf('admin.materiels.relationships.equipementSorties', ['sorties' => $materiel->equipementSorties])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection