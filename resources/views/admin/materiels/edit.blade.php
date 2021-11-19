@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.materiel.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.materiels.update", [$materiel->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('lot') ? 'has-error' : '' }}">
                            <label for="lot">{{ trans('cruds.materiel.fields.lot') }}</label>
                            <input class="form-control" type="text" name="lot" id="lot" value="{{ old('lot', $materiel->lot) }}">
                            @if($errors->has('lot'))
                                <span class="help-block" role="alert">{{ $errors->first('lot') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.materiel.fields.lot_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('id_unique') ? 'has-error' : '' }}">
                            <label for="id_unique">{{ trans('cruds.materiel.fields.id_unique') }}</label>
                            <input class="form-control" type="text" name="id_unique" id="id_unique" value="{{ old('id_unique', $materiel->id_unique) }}">
                            @if($errors->has('id_unique'))
                                <span class="help-block" role="alert">{{ $errors->first('id_unique') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.materiel.fields.id_unique_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                            <label class="required" for="code">{{ trans('cruds.materiel.fields.code') }}</label>
                            <input class="form-control" type="text" name="code" id="code" value="{{ old('code', $materiel->code) }}" required>
                            @if($errors->has('code'))
                                <span class="help-block" role="alert">{{ $errors->first('code') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.materiel.fields.code_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('identifiant') ? 'has-error' : '' }}">
                            <label class="required" for="identifiant">{{ trans('cruds.materiel.fields.identifiant') }}</label>
                            <input class="form-control" type="text" name="identifiant" id="identifiant" value="{{ old('identifiant', $materiel->identifiant) }}" required>
                            @if($errors->has('identifiant'))
                                <span class="help-block" role="alert">{{ $errors->first('identifiant') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.materiel.fields.identifiant_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('designation') ? 'has-error' : '' }}">
                            <label class="required" for="designation">{{ trans('cruds.materiel.fields.designation') }}</label>
                            <input class="form-control" type="text" name="designation" id="designation" value="{{ old('designation', $materiel->designation) }}" required>
                            @if($errors->has('designation'))
                                <span class="help-block" role="alert">{{ $errors->first('designation') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.materiel.fields.designation_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date_inventaire') ? 'has-error' : '' }}">
                            <label for="date_inventaire">{{ trans('cruds.materiel.fields.date_inventaire') }}</label>
                            <input class="form-control date" type="text" name="date_inventaire" id="date_inventaire" value="{{ old('date_inventaire', $materiel->date_inventaire) }}">
                            @if($errors->has('date_inventaire'))
                                <span class="help-block" role="alert">{{ $errors->first('date_inventaire') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.materiel.fields.date_inventaire_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('quantite') ? 'has-error' : '' }}">
                            <label for="quantite">{{ trans('cruds.materiel.fields.quantite') }}</label>
                            <input class="form-control" type="number" name="quantite" id="quantite" value="{{ old('quantite', $materiel->quantite) }}" step="0.01">
                            @if($errors->has('quantite'))
                                <span class="help-block" role="alert">{{ $errors->first('quantite') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.materiel.fields.quantite_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('marque') ? 'has-error' : '' }}">
                            <label class="required" for="marque">{{ trans('cruds.materiel.fields.marque') }}</label>
                            <input class="form-control" type="text" name="marque" id="marque" value="{{ old('marque', $materiel->marque) }}" required>
                            @if($errors->has('marque'))
                                <span class="help-block" role="alert">{{ $errors->first('marque') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.materiel.fields.marque_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('modele') ? 'has-error' : '' }}">
                            <label class="required" for="modele">{{ trans('cruds.materiel.fields.modele') }}</label>
                            <input class="form-control" type="text" name="modele" id="modele" value="{{ old('modele', $materiel->modele) }}" required>
                            @if($errors->has('modele'))
                                <span class="help-block" role="alert">{{ $errors->first('modele') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.materiel.fields.modele_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('numero_serie') ? 'has-error' : '' }}">
                            <label class="required" for="numero_serie">{{ trans('cruds.materiel.fields.numero_serie') }}</label>
                            <input class="form-control" type="text" name="numero_serie" id="numero_serie" value="{{ old('numero_serie', $materiel->numero_serie) }}" required>
                            @if($errors->has('numero_serie'))
                                <span class="help-block" role="alert">{{ $errors->first('numero_serie') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.materiel.fields.numero_serie_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fabriquant') ? 'has-error' : '' }}">
                            <label class="required" for="fabriquant_id">{{ trans('cruds.materiel.fields.fabriquant') }}</label>
                            <select class="form-control select2" name="fabriquant_id" id="fabriquant_id" required>
                                @foreach($fabriquants as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('fabriquant_id') ? old('fabriquant_id') : $materiel->fabriquant->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('fabriquant'))
                                <span class="help-block" role="alert">{{ $errors->first('fabriquant') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.materiel.fields.fabriquant_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('representant_local') ? 'has-error' : '' }}">
                            <label for="representant_local_id">{{ trans('cruds.materiel.fields.representant_local') }}</label>
                            <select class="form-control select2" name="representant_local_id" id="representant_local_id">
                                @foreach($representant_locals as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('representant_local_id') ? old('representant_local_id') : $materiel->representant_local->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('representant_local'))
                                <span class="help-block" role="alert">{{ $errors->first('representant_local') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.materiel.fields.representant_local_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('prix_unitaire') ? 'has-error' : '' }}">
                            <label for="prix_unitaire">{{ trans('cruds.materiel.fields.prix_unitaire') }}</label>
                            <input class="form-control" type="number" name="prix_unitaire" id="prix_unitaire" value="{{ old('prix_unitaire', $materiel->prix_unitaire) }}" step="1">
                            @if($errors->has('prix_unitaire'))
                                <span class="help-block" role="alert">{{ $errors->first('prix_unitaire') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.materiel.fields.prix_unitaire_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('provenance') ? 'has-error' : '' }}">
                            <label for="provenance_id">{{ trans('cruds.materiel.fields.provenance') }}</label>
                            <select class="form-control select2" name="provenance_id" id="provenance_id">
                                @foreach($provenances as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('provenance_id') ? old('provenance_id') : $materiel->provenance->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('provenance'))
                                <span class="help-block" role="alert">{{ $errors->first('provenance') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.materiel.fields.provenance_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('destination') ? 'has-error' : '' }}">
                            <label for="destination_id">{{ trans('cruds.materiel.fields.destination') }}</label>
                            <select class="form-control select2" name="destination_id" id="destination_id">
                                @foreach($destinations as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('destination_id') ? old('destination_id') : $materiel->destination->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('destination'))
                                <span class="help-block" role="alert">{{ $errors->first('destination') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.materiel.fields.destination_helper') }}</span>
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