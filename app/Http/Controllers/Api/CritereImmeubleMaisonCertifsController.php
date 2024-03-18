<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\MaisonCertif;
use App\Models\CritereImmeuble;
use App\Http\Controllers\Controller;
use App\Http\Resources\MaisonCertifCollection;

class CritereImmeubleMaisonCertifsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CritereImmeuble $critereImmeuble
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, CritereImmeuble $critereImmeuble)
    {
        $this->authorize('view', $critereImmeuble);

        $search = $request->get('search', '');

        $maisonCertifs = $critereImmeuble
            ->maisonCertifs()
            ->search($search)
            ->latest()
            ->paginate();

        return new MaisonCertifCollection($maisonCertifs);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CritereImmeuble $critereImmeuble
     * @param \App\Models\MaisonCertif $maisonCertif
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        CritereImmeuble $critereImmeuble,
        MaisonCertif $maisonCertif
    ) {
        $this->authorize('update', $critereImmeuble);

        $critereImmeuble
            ->maisonCertifs()
            ->syncWithoutDetaching([$maisonCertif->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CritereImmeuble $critereImmeuble
     * @param \App\Models\MaisonCertif $maisonCertif
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        CritereImmeuble $critereImmeuble,
        MaisonCertif $maisonCertif
    ) {
        $this->authorize('update', $critereImmeuble);

        $critereImmeuble->maisonCertifs()->detach($maisonCertif);

        return response()->noContent();
    }
}
