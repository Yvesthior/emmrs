<?php

namespace App\Http\Requests;

use App\Models\IncrementationMateriel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyIncrementationMaterielRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('incrementation_materiel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:incrementation_materiels,id',
        ];
    }
}
