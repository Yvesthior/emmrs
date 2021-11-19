<?php

namespace App\Http\Requests;

use App\Models\SortiesMedicament;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSortiesMedicamentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sorties_medicament_edit');
    }

    public function rules()
    {
        return [
            'medicament_id' => [
                'required',
                'integer',
            ],
            'date_sortie' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'nombre_conditionnement' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total_unite' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'upc' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'rubrique_sortie' => [
                'string',
                'required',
            ],
            'observation' => [
                'string',
                'nullable',
            ],
            'cout' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
