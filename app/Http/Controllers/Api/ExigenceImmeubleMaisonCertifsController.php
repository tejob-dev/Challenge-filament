<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\MaisonCertif;
use App\Models\ExigenceImmeuble;
use App\Http\Controllers\Controller;
use App\Http\Resources\MaisonCertifCollection;

class ExigenceImmeubleMaisonCertifsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ExigenceImmeuble $exigenceImmeuble
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ExigenceImmeuble $exigenceImmeuble)
    {
        $this->authorize('view', $exigenceImmeuble);

        $search = $request->get('search', '');

        $maisonCertifs = $exigenceImmeuble
            ->maisonCertifs()
            ->search($search)
            ->latest()
            ->paginate();

        return new MaisonCertifCollection($maisonCertifs);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ExigenceImmeuble $exigenceImmeuble
     * @param \App\Models\MaisonCertif $maisonCertif
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        ExigenceImmeuble $exigenceImmeuble,
        MaisonCertif $maisonCertif
    ) {
        $this->authorize('update', $exigenceImmeuble);

        $exigenceImmeuble
            ->maisonCertifs()
            ->syncWithoutDetaching([$maisonCertif->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ExigenceImmeuble $exigenceImmeuble
     * @param \App\Models\MaisonCertif $maisonCertif
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        ExigenceImmeuble $exigenceImmeuble,
        MaisonCertif $maisonCertif
    ) {
        $this->authorize('update', $exigenceImmeuble);

        $exigenceImmeuble->maisonCertifs()->detach($maisonCertif);

        return response()->noContent();
    }
}
