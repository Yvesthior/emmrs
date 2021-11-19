@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.destination.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.destinations.update", [$destination->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('nom') ? 'has-error' : '' }}">
                            <label class="required" for="nom">{{ trans('cruds.destination.fields.nom') }}</label>
                            <input class="form-control" type="text" name="nom" id="nom" value="{{ old('nom', $destination->nom) }}" required>
                            @if($errors->has('nom'))
                                <span class="help-block" role="alert">{{ $errors->first('nom') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.destination.fields.nom_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('budget_global') ? 'has-error' : '' }}">
                            <label for="budget_global">{{ trans('cruds.destination.fields.budget_global') }}</label>
                            <input class="form-control" type="number" name="budget_global" id="budget_global" value="{{ old('budget_global', $destination->budget_global) }}" step="1">
                            @if($errors->has('budget_global'))
                                <span class="help-block" role="alert">{{ $errors->first('budget_global') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.destination.fields.budget_global_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('solde') ? 'has-error' : '' }}">
                            <label class="required" for="solde">{{ trans('cruds.destination.fields.solde') }}</label>
                            <input class="form-control" type="number" name="solde" id="solde" value="{{ old('solde', $destination->solde) }}" step="1" required>
                            @if($errors->has('solde'))
                                <span class="help-block" role="alert">{{ $errors->first('solde') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.destination.fields.solde_helper') }}</span>
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