@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.medicament.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.medicaments.update", [$medicament->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                            <label class="required" for="code">{{ trans('cruds.medicament.fields.code') }}</label>
                            <input class="form-control" type="text" name="code" id="code" value="{{ old('code', $medicament->code) }}" required>
                            @if($errors->has('code'))
                                <span class="help-block" role="alert">{{ $errors->first('code') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.medicament.fields.code_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('identifiant') ? 'has-error' : '' }}">
                            <label class="required" for="identifiant">{{ trans('cruds.medicament.fields.identifiant') }}</label>
                            <input class="form-control" type="text" name="identifiant" id="identifiant" value="{{ old('identifiant', $medicament->identifiant) }}" required>
                            @if($errors->has('identifiant'))
                                <span class="help-block" role="alert">{{ $errors->first('identifiant') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.medicament.fields.identifiant_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('designation') ? 'has-error' : '' }}">
                            <label class="required" for="designation">{{ trans('cruds.medicament.fields.designation') }}</label>
                            <input class="form-control" type="text" name="designation" id="designation" value="{{ old('designation', $medicament->designation) }}" required>
                            @if($errors->has('designation'))
                                <span class="help-block" role="alert">{{ $errors->first('designation') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.medicament.fields.designation_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('lot') ? 'has-error' : '' }}">
                            <label class="required" for="lot">{{ trans('cruds.medicament.fields.lot') }}</label>
                            <input class="form-control" type="text" name="lot" id="lot" value="{{ old('lot', $medicament->lot) }}" required>
                            @if($errors->has('lot'))
                                <span class="help-block" role="alert">{{ $errors->first('lot') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.medicament.fields.lot_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.medicament.fields.type') }}</label>
                            <select class="form-control" name="type" id="type" required>
                                <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Medicament::TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('type', $medicament->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type'))
                                <span class="help-block" role="alert">{{ $errors->first('type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.medicament.fields.type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dci') ? 'has-error' : '' }}">
                            <label for="dci">{{ trans('cruds.medicament.fields.dci') }}</label>
                            <input class="form-control" type="text" name="dci" id="dci" value="{{ old('dci', $medicament->dci) }}">
                            @if($errors->has('dci'))
                                <span class="help-block" role="alert">{{ $errors->first('dci') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.medicament.fields.dci_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('forme') ? 'has-error' : '' }}">
                            <label for="forme_id">{{ trans('cruds.medicament.fields.forme') }}</label>
                            <select class="form-control select2" name="forme_id" id="forme_id">
                                @foreach($formes as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('forme_id') ? old('forme_id') : $medicament->forme->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('forme'))
                                <span class="help-block" role="alert">{{ $errors->first('forme') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.medicament.fields.forme_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dosage') ? 'has-error' : '' }}">
                            <label for="dosage_id">{{ trans('cruds.medicament.fields.dosage') }}</label>
                            <select class="form-control select2" name="dosage_id" id="dosage_id">
                                @foreach($dosages as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('dosage_id') ? old('dosage_id') : $medicament->dosage->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('dosage'))
                                <span class="help-block" role="alert">{{ $errors->first('dosage') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.medicament.fields.dosage_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('conditionnement') ? 'has-error' : '' }}">
                            <label for="conditionnement_id">{{ trans('cruds.medicament.fields.conditionnement') }}</label>
                            <select class="form-control select2" name="conditionnement_id" id="conditionnement_id">
                                @foreach($conditionnements as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('conditionnement_id') ? old('conditionnement_id') : $medicament->conditionnement->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('conditionnement'))
                                <span class="help-block" role="alert">{{ $errors->first('conditionnement') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.medicament.fields.conditionnement_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('upc') ? 'has-error' : '' }}">
                            <label for="upc">{{ trans('cruds.medicament.fields.upc') }}</label>
                            <input class="form-control" type="number" name="upc" id="upc" value="{{ old('upc', $medicament->upc) }}" step="1">
                            @if($errors->has('upc'))
                                <span class="help-block" role="alert">{{ $errors->first('upc') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.medicament.fields.upc_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nombre_conditionnement') ? 'has-error' : '' }}">
                            <label for="nombre_conditionnement">{{ trans('cruds.medicament.fields.nombre_conditionnement') }}</label>
                            <input class="form-control" type="number" name="nombre_conditionnement" id="nombre_conditionnement" value="{{ old('nombre_conditionnement', $medicament->nombre_conditionnement) }}" step="1">
                            @if($errors->has('nombre_conditionnement'))
                                <span class="help-block" role="alert">{{ $errors->first('nombre_conditionnement') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.medicament.fields.nombre_conditionnement_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('prix_unitaire') ? 'has-error' : '' }}">
                            <label for="prix_unitaire">{{ trans('cruds.medicament.fields.prix_unitaire') }}</label>
                            <input class="form-control" type="number" name="prix_unitaire" id="prix_unitaire" value="{{ old('prix_unitaire', $medicament->prix_unitaire) }}" step="1">
                            @if($errors->has('prix_unitaire'))
                                <span class="help-block" role="alert">{{ $errors->first('prix_unitaire') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.medicament.fields.prix_unitaire_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date_peremption') ? 'has-error' : '' }}">
                            <label for="date_peremption">{{ trans('cruds.medicament.fields.date_peremption') }}</label>
                            <input class="form-control date" type="text" name="date_peremption" id="date_peremption" value="{{ old('date_peremption', $medicament->date_peremption) }}">
                            @if($errors->has('date_peremption'))
                                <span class="help-block" role="alert">{{ $errors->first('date_peremption') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.medicament.fields.date_peremption_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('classe_therapeutique') ? 'has-error' : '' }}">
                            <label for="classe_therapeutique_id">{{ trans('cruds.medicament.fields.classe_therapeutique') }}</label>
                            <select class="form-control select2" name="classe_therapeutique_id" id="classe_therapeutique_id">
                                @foreach($classe_therapeutiques as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('classe_therapeutique_id') ? old('classe_therapeutique_id') : $medicament->classe_therapeutique->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('classe_therapeutique'))
                                <span class="help-block" role="alert">{{ $errors->first('classe_therapeutique') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.medicament.fields.classe_therapeutique_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fabriquant') ? 'has-error' : '' }}">
                            <label for="fabriquant_id">{{ trans('cruds.medicament.fields.fabriquant') }}</label>
                            <select class="form-control select2" name="fabriquant_id" id="fabriquant_id">
                                @foreach($fabriquants as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('fabriquant_id') ? old('fabriquant_id') : $medicament->fabriquant->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('fabriquant'))
                                <span class="help-block" role="alert">{{ $errors->first('fabriquant') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.medicament.fields.fabriquant_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('formule') ? 'has-error' : '' }}">
                            <label for="formule_id">{{ trans('cruds.medicament.fields.formule') }}</label>
                            <select class="form-control select2" name="formule_id" id="formule_id">
                                @foreach($formules as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('formule_id') ? old('formule_id') : $medicament->formule->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('formule'))
                                <span class="help-block" role="alert">{{ $errors->first('formule') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.medicament.fields.formule_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('famille') ? 'has-error' : '' }}">
                            <label for="famille_id">{{ trans('cruds.medicament.fields.famille') }}</label>
                            <select class="form-control select2" name="famille_id" id="famille_id">
                                @foreach($familles as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('famille_id') ? old('famille_id') : $medicament->famille->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('famille'))
                                <span class="help-block" role="alert">{{ $errors->first('famille') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.medicament.fields.famille_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date_reception') ? 'has-error' : '' }}">
                            <label for="date_reception">{{ trans('cruds.medicament.fields.date_reception') }}</label>
                            <input class="form-control date" type="text" name="date_reception" id="date_reception" value="{{ old('date_reception', $medicament->date_reception) }}">
                            @if($errors->has('date_reception'))
                                <span class="help-block" role="alert">{{ $errors->first('date_reception') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.medicament.fields.date_reception_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('provenance') ? 'has-error' : '' }}">
                            <label for="provenance_id">{{ trans('cruds.medicament.fields.provenance') }}</label>
                            <select class="form-control select2" name="provenance_id" id="provenance_id">
                                @foreach($provenances as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('provenance_id') ? old('provenance_id') : $medicament->provenance->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('provenance'))
                                <span class="help-block" role="alert">{{ $errors->first('provenance') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.medicament.fields.provenance_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fournisseur') ? 'has-error' : '' }}">
                            <label for="fournisseur_id">{{ trans('cruds.medicament.fields.fournisseur') }}</label>
                            <select class="form-control select2" name="fournisseur_id" id="fournisseur_id">
                                @foreach($fournisseurs as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('fournisseur_id') ? old('fournisseur_id') : $medicament->fournisseur->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('fournisseur'))
                                <span class="help-block" role="alert">{{ $errors->first('fournisseur') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.medicament.fields.fournisseur_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('destination') ? 'has-error' : '' }}">
                            <label for="destination_id">{{ trans('cruds.medicament.fields.destination') }}</label>
                            <select class="form-control select2" name="destination_id" id="destination_id">
                                @foreach($destinations as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('destination_id') ? old('destination_id') : $medicament->destination->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('destination'))
                                <span class="help-block" role="alert">{{ $errors->first('destination') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.medicament.fields.destination_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('reference') ? 'has-error' : '' }}">
                            <label for="reference_id">{{ trans('cruds.medicament.fields.reference') }}</label>
                            <select class="form-control select2" name="reference_id" id="reference_id">
                                @foreach($references as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('reference_id') ? old('reference_id') : $medicament->reference->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('reference'))
                                <span class="help-block" role="alert">{{ $errors->first('reference') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.medicament.fields.reference_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('observation') ? 'has-error' : '' }}">
                            <label for="observation">{{ trans('cruds.medicament.fields.observation') }}</label>
                            <input class="form-control" type="text" name="observation" id="observation" value="{{ old('observation', $medicament->observation) }}">
                            @if($errors->has('observation'))
                                <span class="help-block" role="alert">{{ $errors->first('observation') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.medicament.fields.observation_helper') }}</span>
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