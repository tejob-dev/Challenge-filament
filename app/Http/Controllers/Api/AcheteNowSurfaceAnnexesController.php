<?php
namespace App\Http\Controllers\Api;

use App\Models\AcheteNow;
use Illuminate\Http\Request;
use App\Models\SurfaceAnnexe;
use App\Http\Controllers\Controller;
use App\Http\Resources\SurfaceAnnexeCollection;

class AcheteNowSurfaceAnnexesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AcheteNow $acheteNow
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, AcheteNow $acheteNow)
    {
        $this->authorize('view', $acheteNow);

        $search = $request->get('search', '');

        $surfaceAnnexes = $acheteNow
            ->surfaceAnnexes()
            ->search($search)
            ->latest()
            ->paginate();

        return new SurfaceAnnexeCollection($surfaceAnnexes);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AcheteNow $acheteNow
     * @param \App\Models\SurfaceAnnexe $surfaceAnnexe
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        AcheteNow $acheteNow,
        SurfaceAnnexe $surfaceAnnexe
    ) {
        $this->authorize('update', $acheteNow);

        $acheteNow
            ->surfaceAnnexes()
            ->syncWithoutDetaching([$surfaceAnnexe->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AcheteNow $acheteNow
     * @param \App\Models\SurfaceAnnexe $surfaceAnnexe
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        AcheteNow $acheteNow,
        SurfaceAnnexe $surfaceAnnexe
    ) {
        $this->authorize('update', $acheteNow);

        $acheteNow->surfaceAnnexes()->detach($surfaceAnnexe);

        return response()->noContent();
    }
}
