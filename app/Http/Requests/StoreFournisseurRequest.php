<?php

namespace App\Http\Requests;

use App\Models\Fournisseur;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFournisseurRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fournisseur_create');
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
