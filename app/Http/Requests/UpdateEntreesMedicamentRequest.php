<?php

namespace App\Http\Requests;

use App\Models\EntreesMedicament;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEntreesMedicamentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('entrees_medicament_edit');
    }

    public function rules()
    {
        return [
            'medicament_id' => [
                'required',
                'integer',
            ],
            'date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'nombre_conditionnement' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'upc' => [
                'string',
                'nullable',
            ],
            'prix_unitaire' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'date_peremption' => [
                'string',
                'nullable',
            ],
        ];
    }
}
