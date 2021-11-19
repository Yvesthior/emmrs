@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.representantsLocaux.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.representants-locauxes.update", [$representantsLocaux->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('nom') ? 'has-error' : '' }}">
                            <label class="required" for="nom">{{ trans('cruds.representantsLocaux.fields.nom') }}</label>
                            <input class="form-control" type="text" name="nom" id="nom" value="{{ old('nom', $representantsLocaux->nom) }}" required>
                            @if($errors->has('nom'))
                                <span class="help-block" role="alert">{{ $errors->first('nom') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.representantsLocaux.fields.nom_helper') }}</span>
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