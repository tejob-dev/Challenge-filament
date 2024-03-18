<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaisonCertifUpdateRequest extends FormRequest
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
            'nom_prenom' => 'max:255|string',
            'telephone' => 'max:255|string',
            'email' => 'nullable|email',
            'surface_habitable' => 'nullable|max:255|string',
            'commune' => 'nullable|max:255|string',
            'typelogement' => 'nullable|max:255|string',
            'nbr_chambre' => 'nullable|max:255|string',
            'nbr_salle' => 'nullable|max:255|string',
            'moment_acquis' => 'nullable|max:255|string',
            'budget' => 'nullable|max:255|string',
            'ma_preference' => 'nullable|max:255|string',
            'autre_budget' => 'nullable|max:255|string',
            'type_construction' => 'nullable|max:255|string',
            'type_emploi' => 'nullable|max:255|string',
            'proprietaire' => 'nullable|max:255|string',
            'typeDeSurfaces' => ['array'],
            'critereImmeubles' => ['array'],
            'exigenceImmeubles' => ['array'],
        ];
    }
}
