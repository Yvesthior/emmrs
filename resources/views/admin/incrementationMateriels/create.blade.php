@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.incrementationMateriel.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.incrementation-materiels.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('materiel') ? 'has-error' : '' }}">
                            <label for="materiel_id">{{ trans('cruds.incrementationMateriel.fields.materiel') }}</label>
                            <select class="form-control select2" name="materiel_id" id="materiel_id">
                                @foreach($materiels as $id => $entry)
                                    <option value="{{ $id }}" {{ old('materiel_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('materiel'))
                                <span class="help-block" role="alert">{{ $errors->first('materiel') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.incrementationMateriel.fields.materiel_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('quantite') ? 'has-error' : '' }}">
                            <label for="quantite">{{ trans('cruds.incrementationMateriel.fields.quantite') }}</label>
                            <input class="form-control" type="number" name="quantite" id="quantite" value="{{ old('quantite', '') }}" step="1">
                            @if($errors->has('quantite'))
                                <span class="help-block" role="alert">{{ $errors->first('quantite') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.incrementationMateriel.fields.quantite_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                            <label for="date">{{ trans('cruds.incrementationMateriel.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date') }}">
                            @if($errors->has('date'))
                                <span class="help-block" role="alert">{{ $errors->first('date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.incrementationMateriel.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('provenance') ? 'has-error' : '' }}">
                            <label for="provenance_id">{{ trans('cruds.incrementationMateriel.fields.provenance') }}</label>
                            <select class="form-control select2" name="provenance_id" id="provenance_id">
                                @foreach($provenances as $id => $entry)
                                    <option value="{{ $id }}" {{ old('provenance_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('provenance'))
                                <span class="help-block" role="alert">{{ $errors->first('provenance') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.incrementationMateriel.fields.provenance_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('prix_unitaire') ? 'has-error' : '' }}">
                            <label for="prix_unitaire">{{ trans('cruds.incrementationMateriel.fields.prix_unitaire') }}</label>
                            <input class="form-control" type="number" name="prix_unitaire" id="prix_unitaire" value="{{ old('prix_unitaire', '1') }}" step="1">
                            @if($errors->has('prix_unitaire'))
                                <span class="help-block" role="alert">{{ $errors->first('prix_unitaire') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.incrementationMateriel.fields.prix_unitaire_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date_peremption') ? 'has-error' : '' }}">
                            <label for="date_peremption">{{ trans('cruds.incrementationMateriel.fields.date_peremption') }}</label>
                            <input class="form-control" type="text" name="date_peremption" id="date_peremption" value="{{ old('date_peremption', '') }}">
                            @if($errors->has('date_peremption'))
                                <span class="help-block" role="alert">{{ $errors->first('date_peremption') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.incrementationMateriel.fields.date_peremption_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fabriquant') ? 'has-error' : '' }}">
                            <label for="fabriquant_id">{{ trans('cruds.incrementationMateriel.fields.fabriquant') }}</label>
                            <select class="form-control select2" name="fabriquant_id" id="fabriquant_id">
                                @foreach($fabriquants as $id => $entry)
                                    <option value="{{ $id }}" {{ old('fabriquant_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('fabriquant'))
                                <span class="help-block" role="alert">{{ $errors->first('fabriquant') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.incrementationMateriel.fields.fabriquant_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('destination') ? 'has-error' : '' }}">
                            <label for="destination_id">{{ trans('cruds.incrementationMateriel.fields.destination') }}</label>
                            <select class="form-control select2" name="destination_id" id="destination_id">
                                @foreach($destinations as $id => $entry)
                                    <option value="{{ $id }}" {{ old('destination_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('destination'))
                                <span class="help-block" role="alert">{{ $errors->first('destination') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.incrementationMateriel.fields.destination_helper') }}</span>
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