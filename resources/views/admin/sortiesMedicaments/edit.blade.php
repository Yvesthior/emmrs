@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.sortiesMedicament.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.sorties-medicaments.update", [$sortiesMedicament->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('medicament') ? 'has-error' : '' }}">
                            <label class="required" for="medicament_id">{{ trans('cruds.sortiesMedicament.fields.medicament') }}</label>
                            <select class="form-control select2" name="medicament_id" id="medicament_id" required>
                                @foreach($medicaments as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('medicament_id') ? old('medicament_id') : $sortiesMedicament->medicament->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('medicament'))
                                <span class="help-block" role="alert">{{ $errors->first('medicament') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.sortiesMedicament.fields.medicament_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date_sortie') ? 'has-error' : '' }}">
                            <label class="required" for="date_sortie">{{ trans('cruds.sortiesMedicament.fields.date_sortie') }}</label>
                            <input class="form-control date" type="text" name="date_sortie" id="date_sortie" value="{{ old('date_sortie', $sortiesMedicament->date_sortie) }}" required>
                            @if($errors->has('date_sortie'))
                                <span class="help-block" role="alert">{{ $errors->first('date_sortie') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.sortiesMedicament.fields.date_sortie_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nombre_conditionnement') ? 'has-error' : '' }}">
                            <label for="nombre_conditionnement">{{ trans('cruds.sortiesMedicament.fields.nombre_conditionnement') }}</label>
                            <input class="form-control" type="number" name="nombre_conditionnement" id="nombre_conditionnement" value="{{ old('nombre_conditionnement', $sortiesMedicament->nombre_conditionnement) }}" step="1">
                            @if($errors->has('nombre_conditionnement'))
                                <span class="help-block" role="alert">{{ $errors->first('nombre_conditionnement') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.sortiesMedicament.fields.nombre_conditionnement_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('total_unite') ? 'has-error' : '' }}">
                            <label for="total_unite">{{ trans('cruds.sortiesMedicament.fields.total_unite') }}</label>
                            <input class="form-control" type="number" name="total_unite" id="total_unite" value="{{ old('total_unite', $sortiesMedicament->total_unite) }}" step="1">
                            @if($errors->has('total_unite'))
                                <span class="help-block" role="alert">{{ $errors->first('total_unite') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.sortiesMedicament.fields.total_unite_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('upc') ? 'has-error' : '' }}">
                            <label class="required" for="upc">{{ trans('cruds.sortiesMedicament.fields.upc') }}</label>
                            <input class="form-control" type="number" name="upc" id="upc" value="{{ old('upc', $sortiesMedicament->upc) }}" step="1" required>
                            @if($errors->has('upc'))
                                <span class="help-block" role="alert">{{ $errors->first('upc') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.sortiesMedicament.fields.upc_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('rubrique_sortie') ? 'has-error' : '' }}">
                            <label class="required" for="rubrique_sortie">{{ trans('cruds.sortiesMedicament.fields.rubrique_sortie') }}</label>
                            <input class="form-control" type="text" name="rubrique_sortie" id="rubrique_sortie" value="{{ old('rubrique_sortie', $sortiesMedicament->rubrique_sortie) }}" required>
                            @if($errors->has('rubrique_sortie'))
                                <span class="help-block" role="alert">{{ $errors->first('rubrique_sortie') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.sortiesMedicament.fields.rubrique_sortie_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('destination') ? 'has-error' : '' }}">
                            <label for="destination_id">{{ trans('cruds.sortiesMedicament.fields.destination') }}</label>
                            <select class="form-control select2" name="destination_id" id="destination_id">
                                @foreach($destinations as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('destination_id') ? old('destination_id') : $sortiesMedicament->destination->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('destination'))
                                <span class="help-block" role="alert">{{ $errors->first('destination') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.sortiesMedicament.fields.destination_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('observation') ? 'has-error' : '' }}">
                            <label for="observation">{{ trans('cruds.sortiesMedicament.fields.observation') }}</label>
                            <input class="form-control" type="text" name="observation" id="observation" value="{{ old('observation', $sortiesMedicament->observation) }}">
                            @if($errors->has('observation'))
                                <span class="help-block" role="alert">{{ $errors->first('observation') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.sortiesMedicament.fields.observation_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cout') ? 'has-error' : '' }}">
                            <label for="cout">{{ trans('cruds.sortiesMedicament.fields.cout') }}</label>
                            <input class="form-control" type="number" name="cout" id="cout" value="{{ old('cout', $sortiesMedicament->cout) }}" step="1">
                            @if($errors->has('cout'))
                                <span class="help-block" role="alert">{{ $errors->first('cout') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.sortiesMedicament.fields.cout_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection