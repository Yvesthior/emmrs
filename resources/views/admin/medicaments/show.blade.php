@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.medicament.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.medicaments.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicament.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $medicament->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicament.fields.code') }}
                                    </th>
                                    <td>
                                        {{ $medicament->code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicament.fields.identifiant') }}
                                    </th>
                                    <td>
                                        {{ $medicament->identifiant }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicament.fields.designation') }}
                                    </th>
                                    <td>
                                        {{ $medicament->designation }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicament.fields.lot') }}
                                    </th>
                                    <td>
                                        {{ $medicament->lot }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicament.fields.type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Medicament::TYPE_SELECT[$medicament->type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicament.fields.dci') }}
                                    </th>
                                    <td>
                                        {{ $medicament->dci }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicament.fields.forme') }}
                                    </th>
                                    <td>
                                        {{ $medicament->forme->designation ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicament.fields.dosage') }}
                                    </th>
                                    <td>
                                        {{ $medicament->dosage->quantite ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicament.fields.conditionnement') }}
                                    </th>
                                    <td>
                                        {{ $medicament->conditionnement->designation ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicament.fields.upc') }}
                                    </th>
                                    <td>
                                        {{ $medicament->upc }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicament.fields.nombre_conditionnement') }}
                                    </th>
                                    <td>
                                        {{ $medicament->nombre_conditionnement }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicament.fields.total_unites') }}
                                    </th>
                                    <td>
                                        {{ $medicament->total_unites }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicament.fields.prix_unitaire') }}
                                    </th>
                                    <td>
                                        {{ $medicament->prix_unitaire }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicament.fields.prix_total') }}
                                    </th>
                                    <td>
                                        {{ $medicament->prix_total }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicament.fields.date_peremption') }}
                                    </th>
                                    <td>
                                        {{ $medicament->date_peremption }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicament.fields.classe_therapeutique') }}
                                    </th>
                                    <td>
                                        {{ $medicament->classe_therapeutique->nom ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicament.fields.fabriquant') }}
                                    </th>
                                    <td>
                                        {{ $medicament->fabriquant->nom ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicament.fields.formule') }}
                                    </th>
                                    <td>
                                        {{ $medicament->formule->nom ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicament.fields.famille') }}
                                    </th>
                                    <td>
                                        {{ $medicament->famille->nom ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicament.fields.date_reception') }}
                                    </th>
                                    <td>
                                        {{ $medicament->date_reception }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicament.fields.provenance') }}
                                    </th>
                                    <td>
                                        {{ $medicament->provenance->nom ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicament.fields.fournisseur') }}
                                    </th>
                                    <td>
                                        {{ $medicament->fournisseur->nom ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicament.fields.destination') }}
                                    </th>
                                    <td>
                                        {{ $medicament->destination->nom ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicament.fields.reference') }}
                                    </th>
                                    <td>
                                        {{ $medicament->reference->code ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicament.fields.observation') }}
                                    </th>
                                    <td>
                                        {{ $medicament->observation }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.medicament.fields.slug') }}
                                    </th>
                                    <td>
                                        {{ $medicament->slug }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.medicaments.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection