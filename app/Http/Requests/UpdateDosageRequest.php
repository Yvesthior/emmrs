<?php

namespace App\Http\Requests;

use App\Models\Dosage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDosageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dosage_edit');
    }

    public function rules()
    {
        return [
            'quantite' => [
                'string',
                'nullable',
            ],
        ];
    }
}
