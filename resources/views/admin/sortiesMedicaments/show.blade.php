@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.sortiesMedicament.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.sorties-medicaments.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sortiesMedicament.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $sortiesMedicament->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sortiesMedicament.fields.medicament') }}
                                    </th>
                                    <td>
                                        {{ $sortiesMedicament->medicament->slug ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sortiesMedicament.fields.date_sortie') }}
                                    </th>
                                    <td>
                                        {{ $sortiesMedicament->date_sortie }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sortiesMedicament.fields.nombre_conditionnement') }}
                                    </th>
                                    <td>
                                        {{ $sortiesMedicament->nombre_conditionnement }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sortiesMedicament.fields.total_unite') }}
                                    </th>
                                    <td>
                                        {{ $sortiesMedicament->total_unite }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sortiesMedicament.fields.upc') }}
                                    </th>
                                    <td>
                                        {{ $sortiesMedicament->upc }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sortiesMedicament.fields.rubrique_sortie') }}
                                    </th>
                                    <td>
                                        {{ $sortiesMedicament->rubrique_sortie }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sortiesMedicament.fields.destination') }}
                                    </th>
                                    <td>
                                        {{ $sortiesMedicament->destination->nom ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sortiesMedicament.fields.observation') }}
                                    </th>
                                    <td>
                                        {{ $sortiesMedicament->observation }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sortiesMedicament.fields.cout') }}
                                    </th>
                                    <td>
                                        {{ $sortiesMedicament->cout }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.sorties-medicaments.index') }}">
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