<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificationStoreRequest extends FormRequest
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
            'nom_prenom' => 'required|max:255|string',
            'adresse' => 'nullable|max:255|string',
            'email' => 'nullable|email',
            'contact' => 'nullable|max:255|string',
            'typebien' => 'nullable|max:255|string',
            'type_certif' => 'array',
        ];
    }
}
