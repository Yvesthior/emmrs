<?php

namespace App\Http\Requests;

use App\Models\ClasseTherapeutique;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyClasseTherapeutiqueRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('classe_therapeutique_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:classe_therapeutiques,id',
        ];
    }
}
