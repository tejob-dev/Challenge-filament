<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcheteNowUpdateRequest extends FormRequest
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
            'ou_recherchez_vous' => 'nullable|max:255|string',
            'typelogement' => 'nullable|max:255|string',
            'surface-recherch' => 'nullable|max:255|string',
            'criter_appart' => 'nullable|max:255|string',
            'filtrag_annonce' => 'required|max:255|string',
            'min_budget' => 'nullable|max:255|string',
            'typelogement' => 'nullable|max:255|string',
            'max_budget' => 'nullable|max:255|string',
            'criter_appart' => 'nullable|max:255|string',
            'nbr_piece' => 'nullable|max:255|string',
            'filtrag_annonce' => 'required|max:255|string',
            'nbr_chambre' => 'nullable|max:255|string',
            'surface' => 'nullable|max:255|string',
            'etatAchats' => ['array'],
            'surfaceAnnexes' => ['array'],
            'exigenceParticulieres' => ['array'],
        ];
    }
}
