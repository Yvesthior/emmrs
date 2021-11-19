@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.sorty.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.sorties.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('equipement') ? 'has-error' : '' }}">
                            <label class="required" for="equipement_id">{{ trans('cruds.sorty.fields.equipement') }}</label>
                            <select class="form-control select2" name="equipement_id" id="equipement_id" required>
                                @foreach($equipements as $id => $entry)
                                    <option value="{{ $id }}" {{ old('equipement_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('equipement'))
                                <span class="help-block" role="alert">{{ $errors->first('equipement') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.sorty.fields.equipement_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('quantite') ? 'has-error' : '' }}">
                            <label class="required" for="quantite">{{ trans('cruds.sorty.fields.quantite') }}</label>
                            <input class="form-control" type="number" name="quantite" id="quantite" value="{{ old('quantite', '1') }}" step="1" required>
                            @if($errors->has('quantite'))
                                <span class="help-block" role="alert">{{ $errors->first('quantite') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.sorty.fields.quantite_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date_sortie') ? 'has-error' : '' }}">
                            <label class="required" for="date_sortie">{{ trans('cruds.sorty.fields.date_sortie') }}</label>
                            <input class="form-control date" type="text" name="date_sortie" id="date_sortie" value="{{ old('date_sortie') }}" required>
                            @if($errors->has('date_sortie'))
                                <span class="help-block" role="alert">{{ $errors->first('date_sortie') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.sorty.fields.date_sortie_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('rubrique') ? 'has-error' : '' }}">
                            <label class="required" for="rubrique">{{ trans('cruds.sorty.fields.rubrique') }}</label>
                            <input class="form-control" type="text" name="rubrique" id="rubrique" value="{{ old('rubrique', '') }}" required>
                            @if($errors->has('rubrique'))
                                <span class="help-block" role="alert">{{ $errors->first('rubrique') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.sorty.fields.rubrique_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('destination') ? 'has-error' : '' }}">
                            <label class="required" for="destination_id">{{ trans('cruds.sorty.fields.destination') }}</label>
                            <select class="form-control select2" name="destination_id" id="destination_id" required>
                                @foreach($destinations as $id => $entry)
                                    <option value="{{ $id }}" {{ old('destination_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('destination'))
                                <span class="help-block" role="alert">{{ $errors->first('destination') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.sorty.fields.destination_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('observation') ? 'has-error' : '' }}">
                            <label for="observation">{{ trans('cruds.sorty.fields.observation') }}</label>
                            <input class="form-control" type="text" name="observation" id="observation" value="{{ old('observation', '') }}">
                            @if($errors->has('observation'))
                                <span class="help-block" role="alert">{{ $errors->first('observation') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.sorty.fields.observation_helper') }}</span>
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