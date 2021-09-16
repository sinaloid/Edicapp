<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataCommuneRequest extends FormRequest
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
            'commune_img_carte' => 'image|dimensions:min_width=100,min_height=100',
            'commune_img_logo' => 'image|dimensions:min_width=100,min_height=100',
            'commune_img_autre' => 'image|dimensions:min_width=100,min_height=100',
        ];
    }
}
