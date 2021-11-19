<?php

namespace App\Http\Requests;

use App\Models\Fournisseur;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFournisseurRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fournisseur_edit');
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
