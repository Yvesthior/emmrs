<?php

namespace App\Http\Requests;

use App\Models\Destination;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDestinationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('destination_edit');
    }

    public function rules()
    {
        return [
            'nom' => [
                'string',
                'required',
            ],
            'budget_global' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'solde' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
