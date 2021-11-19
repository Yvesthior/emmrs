<?php

namespace App\Http\Requests;

use App\Models\RepresentantsLocaux;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRepresentantsLocauxRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('representants_locaux_edit');
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
