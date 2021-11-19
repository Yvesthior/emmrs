<?php

namespace App\Http\Requests;

use App\Models\Formule;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFormuleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('formule_create');
    }

    public function rules()
    {
        return [
            'nom' => [
                'string',
                'required',
            ],
        ];
    }
}
