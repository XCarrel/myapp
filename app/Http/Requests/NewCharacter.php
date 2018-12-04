<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewCharacter extends FormRequest
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
            'newname' => 'required|min:2|max:10'
        ];
    }

    public function messages()
    {
        return [
            'newname.required' => 'Ce champ doit être rempli',
            'newname.min' => 'Le nom doit contenir au moins 2 caractères',
            'newname.max' => 'Le nom ne peut pas faire plus de 10 caractères'
        ];
    }
}
