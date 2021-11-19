@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.entreesMedicament.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.entrees-medicaments.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.entreesMedicament.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $entreesMedicament->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.entreesMedicament.fields.medicament') }}
                                    </th>
                                    <td>
                                        {{ $entreesMedicament->medicament->slug ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.entreesMedicament.fields.date') }}
                                    </th>
                                    <td>
                                        {{ $entreesMedicament->date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.entreesMedicament.fields.provenance') }}
                                    </th>
                                    <td>
                                        {{ $entreesMedicament->provenance->nom ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.entreesMedicament.fields.conditonnement') }}
                                    </th>
                                    <td>
                                        {{ $entreesMedicament->conditonnement->designation ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.entreesMedicament.fields.nombre_conditionnement') }}
                                    </th>
                                    <td>
                                        {{ $entreesMedicament->nombre_conditionnement }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.entreesMedicament.fields.upc') }}
                                    </th>
                                    <td>
                                        {{ $entreesMedicament->upc }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.entreesMedicament.fields.prix_unitaire') }}
                                    </th>
                                    <td>
                                        {{ $entreesMedicament->prix_unitaire }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.entreesMedicament.fields.date_peremption') }}
                                    </th>
                                    <td>
                                        {{ $entreesMedicament->date_peremption }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.entreesMedicament.fields.fabriquant') }}
                                    </th>
                                    <td>
                                        {{ $entreesMedicament->fabriquant->nom ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.entreesMedicament.fields.destination') }}
                                    </th>
                                    <td>
                                        {{ $entreesMedicament->destination->nom ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.entrees-medicaments.index') }}">
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