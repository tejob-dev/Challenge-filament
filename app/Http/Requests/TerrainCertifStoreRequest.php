<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TerrainCertifStoreRequest extends FormRequest
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
            'telephone' => 'nullable|max:255|string',
            'email' => 'nullable|email',
            'commune' => 'nullable|max:255|string',
            'info_spplement' => 'nullable|max:255|string',
            'surface' => 'nullable|max:255|string',
            'obj_achat' => 'nullable|max:255|string',
            'min_budget' => 'nullable|max:255|string',
            'moment_acquis' => 'required|max:255|string',
            'max_budget' => 'nullable|max:255|string',
            'config_terrain' => 'nullable|max:255|string',
            'prec_config_terrain' => 'nullable|max:255|string',
            'financement' => 'nullable|max:255|string',
            'votre_poste' => 'nullable|max:255|string',
            'partic_group' => 'nullable|max:255|string',
        ];
    }
}
