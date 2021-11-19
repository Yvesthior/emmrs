@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.site.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.sites.update", [$site->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('nom') ? 'has-error' : '' }}">
                            <label class="required" for="nom">{{ trans('cruds.site.fields.nom') }}</label>
                            <input class="form-control" type="text" name="nom" id="nom" value="{{ old('nom', $site->nom) }}" required>
                            @if($errors->has('nom'))
                                <span class="help-block" role="alert">{{ $errors->first('nom') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.site.fields.nom_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('solde') ? 'has-error' : '' }}">
                            <label for="solde">{{ trans('cruds.site.fields.solde') }}</label>
                            <input class="form-control" type="number" name="solde" id="solde" value="{{ old('solde', $site->solde) }}" step="0.01">
                            @if($errors->has('solde'))
                                <span class="help-block" role="alert">{{ $errors->first('solde') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.site.fields.solde_helper') }}</span>
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