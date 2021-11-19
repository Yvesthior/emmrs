<?php

namespace App\Http\Requests;

use App\Models\Famille;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFamilleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('famille_edit');
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
