<?php

namespace App\Http\Requests;

use App\Models\Dosage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDosageRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('dosage_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:dosages,id',
        ];
    }
}
