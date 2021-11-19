<?php

namespace App\Http\Requests;

use App\Models\Medicament;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMedicamentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('medicament_create');
    }

    public function rules()
    {
        return [
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
            'lot' => [
                'string',
                'required',
            ],
            'type' => [
                'required',
            ],
            'dci' => [
                'string',
                'nullable',
            ],
            'upc' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'nombre_conditionnement' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total_unites' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'prix_unitaire' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'prix_total' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'date_peremption' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'date_reception' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'observation' => [
                'string',
                'nullable',
            ],
            'slug' => [
                'string',
                'nullable',
            ],
        ];
    }
}
