<?php

namespace App\Http\Requests;

use App\Models\Dosage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDosageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dosage_create');
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
