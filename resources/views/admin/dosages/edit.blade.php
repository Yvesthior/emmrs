@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.dosage.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.dosages.update", [$dosage->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('quantite') ? 'has-error' : '' }}">
                            <label for="quantite">{{ trans('cruds.dosage.fields.quantite') }}</label>
                            <input class="form-control" type="text" name="quantite" id="quantite" value="{{ old('quantite', $dosage->quantite) }}">
                            @if($errors->has('quantite'))
                                <span class="help-block" role="alert">{{ $errors->first('quantite') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.dosage.fields.quantite_helper') }}</span>
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