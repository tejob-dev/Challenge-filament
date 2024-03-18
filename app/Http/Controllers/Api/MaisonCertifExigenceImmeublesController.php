<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\MaisonCertif;
use App\Models\ExigenceImmeuble;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExigenceImmeubleCollection;

class MaisonCertifExigenceImmeublesController extends Controller
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

        $exigenceImmeubles = $maisonCertif
            ->exigenceImmeubles()
            ->search($search)
            ->latest()
            ->paginate();

        return new ExigenceImmeubleCollection($exigenceImmeubles);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MaisonCertif $maisonCertif
     * @param \App\Models\ExigenceImmeuble $exigenceImmeuble
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        MaisonCertif $maisonCertif,
        ExigenceImmeuble $exigenceImmeuble
    ) {
        $this->authorize('update', $maisonCertif);

        $maisonCertif
            ->exigenceImmeubles()
            ->syncWithoutDetaching([$exigenceImmeuble->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MaisonCertif $maisonCertif
     * @param \App\Models\ExigenceImmeuble $exigenceImmeuble
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        MaisonCertif $maisonCertif,
        ExigenceImmeuble $exigenceImmeuble
    ) {
        $this->authorize('update', $maisonCertif);

        $maisonCertif->exigenceImmeubles()->detach($exigenceImmeuble);

        return response()->noContent();
    }
}
