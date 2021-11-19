<?php

namespace App\Http\Requests;

use App\Models\Formule;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFormuleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('formule_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:formules,id',
        ];
    }
}
