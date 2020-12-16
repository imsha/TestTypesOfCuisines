<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CuisineCreate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'min:1',
                'max:190',
            ],
            'keywords' => [
               'array',
               'min:1',
               'max:100',
            ]
        ];
    }
}
