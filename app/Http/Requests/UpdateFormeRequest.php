<?php

namespace App\Http\Requests;

use App\Models\Forme;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFormeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('forme_edit');
    }

    public function rules()
    {
        return [
            'designation' => [
                'string',
                'required',
            ],
        ];
    }
}
