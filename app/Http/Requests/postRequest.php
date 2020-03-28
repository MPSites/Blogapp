<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class postRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // postavljanje ba true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title" => "required",
            "details" => "required",
            "text" => "required", 
            "category" => "not_in:0"
        ];
    }

    public function messages()
    {
        return [
            "required" => "Field :attribute is mandatory."
        ];
    }
}
