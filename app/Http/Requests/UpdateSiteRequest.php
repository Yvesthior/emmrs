<?php

namespace App\Http\Requests;

use App\Models\Site;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSiteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('site_edit');
    }

    public function rules()
    {
        return [
            'nom' => [
                'string',
                'required',
            ],
            'solde' => [
                'numeric',
            ],
        ];
    }
}
