<?php

namespace App\Http\Requests;

use App\Models\Formule;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFormuleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('formule_edit');
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
