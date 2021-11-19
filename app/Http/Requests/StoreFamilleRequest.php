<?php

namespace App\Http\Requests;

use App\Models\Famille;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFamilleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('famille_create');
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
