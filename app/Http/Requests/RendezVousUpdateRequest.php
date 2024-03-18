<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RendezVousUpdateRequest extends FormRequest
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
            'nompre' => 'max:255|string',
            'telephone' => 'nullable|max:255|string',
            'votr_email' => 'nullable|max:255|string',
            'rdv-date' => 'nullable|max:255|string',
            'rdv-hour' => 'nullable|max:255|string',
        ];
    }
}
