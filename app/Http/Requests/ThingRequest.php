<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThingRequest extends FormRequest
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
            'addvalue' => 'required|min:2|max:10|regex:/^[a-zA-Z]+(([,. -][a-zA-Z ])?[a-zA-Z]*)*$/'
        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
    public function messages()
    {
        return [
            'addvalue.required' => 'Un nom est recquis',
            'addvalue.min'  => 'Votre nom ne peut pas être plus petit que 2 charactères',
            'addvalue.regex' => 'Votre nom posséde des caractères non permis'
        ];
    }

}
