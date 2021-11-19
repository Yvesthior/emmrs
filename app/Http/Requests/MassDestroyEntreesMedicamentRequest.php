<?php

namespace App\Http\Requests;

use App\Models\EntreesMedicament;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEntreesMedicamentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('entrees_medicament_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:entrees_medicaments,id',
        ];
    }
}
