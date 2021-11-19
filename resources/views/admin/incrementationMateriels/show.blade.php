@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.incrementationMateriel.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.incrementation-materiels.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.incrementationMateriel.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $incrementationMateriel->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.incrementationMateriel.fields.materiel') }}
                                    </th>
                                    <td>
                                        {{ $incrementationMateriel->materiel->identifiant ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.incrementationMateriel.fields.quantite') }}
                                    </th>
                                    <td>
                                        {{ $incrementationMateriel->quantite }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.incrementationMateriel.fields.date') }}
                                    </th>
                                    <td>
                                        {{ $incrementationMateriel->date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.incrementationMateriel.fields.provenance') }}
                                    </th>
                                    <td>
                                        {{ $incrementationMateriel->provenance->nom ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.incrementationMateriel.fields.prix_unitaire') }}
                                    </th>
                                    <td>
                                        {{ $incrementationMateriel->prix_unitaire }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.incrementationMateriel.fields.date_peremption') }}
                                    </th>
                                    <td>
                                        {{ $incrementationMateriel->date_peremption }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.incrementationMateriel.fields.fabriquant') }}
                                    </th>
                                    <td>
                                        {{ $incrementationMateriel->fabriquant->nom ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.incrementationMateriel.fields.destination') }}
                                    </th>
                                    <td>
                                        {{ $incrementationMateriel->destination->nom ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.incrementation-materiels.index') }}">
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