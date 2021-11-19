<?php

namespace App\Http\Requests;

use App\Models\Materiel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMaterielRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('materiel_create');
    }

    public function rules()
    {
        return [
            'lot' => [
                'string',
                'nullable',
            ],
            'code' => [
                'string',
                'required',
            ],
            'identifiant' => [
                'string',
                'required',
            ],
            'designation' => [
                'string',
                'required',
            ],
            'date_inventaire' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'quantite' => [
                'numeric',
            ],
            'marque' => [
                'string',
                'required',
            ],
            'modele' => [
                'string',
                'required',
            ],
            'numero_serie' => [
                'string',
                'required',
            ],
            'fabriquant_id' => [
                'required',
                'integer',
            ],
            'prix_unitaire' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
