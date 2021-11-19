@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.sorty.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.sorties.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sorty.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $sorty->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sorty.fields.equipement') }}
                                    </th>
                                    <td>
                                        {{ $sorty->equipement->identifiant ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sorty.fields.quantite') }}
                                    </th>
                                    <td>
                                        {{ $sorty->quantite }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sorty.fields.date_sortie') }}
                                    </th>
                                    <td>
                                        {{ $sorty->date_sortie }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sorty.fields.rubrique') }}
                                    </th>
                                    <td>
                                        {{ $sorty->rubrique }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sorty.fields.destination') }}
                                    </th>
                                    <td>
                                        {{ $sorty->destination->nom ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sorty.fields.observation') }}
                                    </th>
                                    <td>
                                        {{ $sorty->observation }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.sorties.index') }}">
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