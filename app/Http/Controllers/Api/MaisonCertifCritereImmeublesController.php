<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\MaisonCertif;
use App\Models\CritereImmeuble;
use App\Http\Controllers\Controller;
use App\Http\Resources\CritereImmeubleCollection;

class MaisonCertifCritereImmeublesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MaisonCertif $maisonCertif
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, MaisonCertif $maisonCertif)
    {
        $this->authorize('view', $maisonCertif);

        $search = $request->get('search', '');

        $critereImmeubles = $maisonCertif
            ->critereImmeubles()
            ->search($search)
            ->latest()
            ->paginate();

        return new CritereImmeubleCollection($critereImmeubles);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MaisonCertif $maisonCertif
     * @param \App\Models\CritereImmeuble $critereImmeuble
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        MaisonCertif $maisonCertif,
        CritereImmeuble $critereImmeuble
    ) {
        $this->authorize('update', $maisonCertif);

        $maisonCertif
            ->critereImmeubles()
            ->syncWithoutDetaching([$critereImmeuble->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MaisonCertif $maisonCertif
     * @param \App\Models\CritereImmeuble $critereImmeuble
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        MaisonCertif $maisonCertif,
        CritereImmeuble $critereImmeuble
    ) {
        $this->authorize('update', $maisonCertif);

        $maisonCertif->critereImmeubles()->detach($critereImmeuble);

        return response()->noContent();
    }
}
