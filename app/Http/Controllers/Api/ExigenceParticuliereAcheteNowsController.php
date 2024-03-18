<?php
namespace App\Http\Controllers\Api;

use App\Models\AcheteNow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExigenceParticuliere;
use App\Http\Resources\AcheteNowCollection;

class ExigenceParticuliereAcheteNowsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ExigenceParticuliere $exigenceParticuliere
     * @return \Illuminate\Http\Response
     */
    public function index(
        Request $request,
        ExigenceParticuliere $exigenceParticuliere
    ) {
        $this->authorize('view', $exigenceParticuliere);

        $search = $request->get('search', '');

        $acheteNows = $exigenceParticuliere
            ->acheteNows()
            ->search($search)
            ->latest()
            ->paginate();

        return new AcheteNowCollection($acheteNows);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ExigenceParticuliere $exigenceParticuliere
     * @param \App\Models\AcheteNow $acheteNow
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        ExigenceParticuliere $exigenceParticuliere,
        AcheteNow $acheteNow
    ) {
        $this->authorize('update', $exigenceParticuliere);

        $exigenceParticuliere
            ->acheteNows()
            ->syncWithoutDetaching([$acheteNow->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ExigenceParticuliere $exigenceParticuliere
     * @param \App\Models\AcheteNow $acheteNow
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        ExigenceParticuliere $exigenceParticuliere,
        AcheteNow $acheteNow
    ) {
        $this->authorize('update', $exigenceParticuliere);

        $exigenceParticuliere->acheteNows()->detach($acheteNow);

        return response()->noContent();
    }
}
