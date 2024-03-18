<?php
namespace App\Http\Controllers\Api;

use App\Models\AcheteNow;
use Illuminate\Http\Request;
use App\Models\SurfaceAnnexe;
use App\Http\Controllers\Controller;
use App\Http\Resources\AcheteNowCollection;

class SurfaceAnnexeAcheteNowsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SurfaceAnnexe $surfaceAnnexe
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, SurfaceAnnexe $surfaceAnnexe)
    {
        $this->authorize('view', $surfaceAnnexe);

        $search = $request->get('search', '');

        $acheteNows = $surfaceAnnexe
            ->acheteNows()
            ->search($search)
            ->latest()
            ->paginate();

        return new AcheteNowCollection($acheteNows);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SurfaceAnnexe $surfaceAnnexe
     * @param \App\Models\AcheteNow $acheteNow
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        SurfaceAnnexe $surfaceAnnexe,
        AcheteNow $acheteNow
    ) {
        $this->authorize('update', $surfaceAnnexe);

        $surfaceAnnexe->acheteNows()->syncWithoutDetaching([$acheteNow->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SurfaceAnnexe $surfaceAnnexe
     * @param \App\Models\AcheteNow $acheteNow
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        SurfaceAnnexe $surfaceAnnexe,
        AcheteNow $acheteNow
    ) {
        $this->authorize('update', $surfaceAnnexe);

        $surfaceAnnexe->acheteNows()->detach($acheteNow);

        return response()->noContent();
    }
}
