<?php

namespace App\Http\Requests;

use App\Models\ClasseTherapeutique;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClasseTherapeutiqueRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('classe_therapeutique_create');
    }

    public function rules()
    {
        return [
            'nom' => [
                'string',
                'nullable',
            ],
        ];
    }
}
