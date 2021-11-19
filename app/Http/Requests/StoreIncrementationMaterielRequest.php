<?php

namespace App\Http\Requests;

use App\Models\IncrementationMateriel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreIncrementationMaterielRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('incrementation_materiel_create');
    }

    public function rules()
    {
        return [
            'quantite' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'date' => [
                'date_format:' . config('panel.date_format'),
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
