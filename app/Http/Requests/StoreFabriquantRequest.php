<?php

namespace App\Http\Requests;

use App\Models\Fabriquant;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFabriquantRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fabriquant_create');
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
