@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.entreesMedicament.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.entrees-medicaments.update", [$entreesMedicament->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('medicament') ? 'has-error' : '' }}">
                            <label class="required" for="medicament_id">{{ trans('cruds.entreesMedicament.fields.medicament') }}</label>
                            <select class="form-control select2" name="medicament_id" id="medicament_id" required>
                                @foreach($medicaments as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('medicament_id') ? old('medicament_id') : $entreesMedicament->medicament->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('medicament'))
                                <span class="help-block" role="alert">{{ $errors->first('medicament') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.entreesMedicament.fields.medicament_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                            <label for="date">{{ trans('cruds.entreesMedicament.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date', $entreesMedicament->date) }}">
                            @if($errors->has('date'))
                                <span class="help-block" role="alert">{{ $errors->first('date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.entreesMedicament.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('provenance') ? 'has-error' : '' }}">
                            <label for="provenance_id">{{ trans('cruds.entreesMedicament.fields.provenance') }}</label>
                            <select class="form-control select2" name="provenance_id" id="provenance_id">
                                @foreach($provenances as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('provenance_id') ? old('provenance_id') : $entreesMedicament->provenance->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('provenance'))
                                <span class="help-block" role="alert">{{ $errors->first('provenance') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.entreesMedicament.fields.provenance_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('conditonnement') ? 'has-error' : '' }}">
                            <label for="conditonnement_id">{{ trans('cruds.entreesMedicament.fields.conditonnement') }}</label>
                            <select class="form-control select2" name="conditonnement_id" id="conditonnement_id">
                                @foreach($conditonnements as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('conditonnement_id') ? old('conditonnement_id') : $entreesMedicament->conditonnement->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('conditonnement'))
                                <span class="help-block" role="alert">{{ $errors->first('conditonnement') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.entreesMedicament.fields.conditonnement_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nombre_conditionnement') ? 'has-error' : '' }}">
                            <label for="nombre_conditionnement">{{ trans('cruds.entreesMedicament.fields.nombre_conditionnement') }}</label>
                            <input class="form-control" type="number" name="nombre_conditionnement" id="nombre_conditionnement" value="{{ old('nombre_conditionnement', $entreesMedicament->nombre_conditionnement) }}" step="1">
                            @if($errors->has('nombre_conditionnement'))
                                <span class="help-block" role="alert">{{ $errors->first('nombre_conditionnement') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.entreesMedicament.fields.nombre_conditionnement_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('upc') ? 'has-error' : '' }}">
                            <label for="upc">{{ trans('cruds.entreesMedicament.fields.upc') }}</label>
                            <input class="form-control" type="text" name="upc" id="upc" value="{{ old('upc', $entreesMedicament->upc) }}">
                            @if($errors->has('upc'))
                                <span class="help-block" role="alert">{{ $errors->first('upc') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.entreesMedicament.fields.upc_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('prix_unitaire') ? 'has-error' : '' }}">
                            <label for="prix_unitaire">{{ trans('cruds.entreesMedicament.fields.prix_unitaire') }}</label>
                            <input class="form-control" type="number" name="prix_unitaire" id="prix_unitaire" value="{{ old('prix_unitaire', $entreesMedicament->prix_unitaire) }}" step="1">
                            @if($errors->has('prix_unitaire'))
                                <span class="help-block" role="alert">{{ $errors->first('prix_unitaire') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.entreesMedicament.fields.prix_unitaire_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date_peremption') ? 'has-error' : '' }}">
                            <label for="date_peremption">{{ trans('cruds.entreesMedicament.fields.date_peremption') }}</label>
                            <input class="form-control" type="text" name="date_peremption" id="date_peremption" value="{{ old('date_peremption', $entreesMedicament->date_peremption) }}">
                            @if($errors->has('date_peremption'))
                                <span class="help-block" role="alert">{{ $errors->first('date_peremption') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.entreesMedicament.fields.date_peremption_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fabriquant') ? 'has-error' : '' }}">
                            <label for="fabriquant_id">{{ trans('cruds.entreesMedicament.fields.fabriquant') }}</label>
                            <select class="form-control select2" name="fabriquant_id" id="fabriquant_id">
                                @foreach($fabriquants as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('fabriquant_id') ? old('fabriquant_id') : $entreesMedicament->fabriquant->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('fabriquant'))
                                <span class="help-block" role="alert">{{ $errors->first('fabriquant') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.entreesMedicament.fields.fabriquant_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('destination') ? 'has-error' : '' }}">
                            <label for="destination_id">{{ trans('cruds.entreesMedicament.fields.destination') }}</label>
                            <select class="form-control select2" name="destination_id" id="destination_id">
                                @foreach($destinations as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('destination_id') ? old('destination_id') : $entreesMedicament->destination->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('destination'))
                                <span class="help-block" role="alert">{{ $errors->first('destination') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.entreesMedicament.fields.destination_helper') }}</span>
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