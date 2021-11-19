<?php

namespace App\Http\Requests;

use App\Models\Sorty;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSortyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sorty_create');
    }

    public function rules()
    {
        return [
            'equipement_id' => [
                'required',
                'integer',
            ],
            'quantite' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'date_sortie' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'rubrique' => [
                'string',
                'required',
            ],
            'destination_id' => [
                'required',
                'integer',
            ],
            'observation' => [
                'string',
                'nullable',
            ],
        ];
    }
}
