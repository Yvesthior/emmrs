<?php

namespace App\Http\Requests;

use App\Models\Conditionnement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreConditionnementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('conditionnement_create');
    }

    public function rules()
    {
        return [
            'designation' => [
                'string',
                'nullable',
            ],
        ];
    }
}
