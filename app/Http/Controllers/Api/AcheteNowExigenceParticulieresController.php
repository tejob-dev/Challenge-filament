<?php
namespace App\Http\Controllers\Api;

use App\Models\AcheteNow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExigenceParticuliere;
use App\Http\Resources\ExigenceParticuliereCollection;

class AcheteNowExigenceParticulieresController extends Controller
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

        $exigenceParticulieres = $acheteNow
            ->exigenceParticulieres()
            ->search($search)
            ->latest()
            ->paginate();

        return new ExigenceParticuliereCollection($exigenceParticulieres);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AcheteNow $acheteNow
     * @param \App\Models\ExigenceParticuliere $exigenceParticuliere
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        AcheteNow $acheteNow,
        ExigenceParticuliere $exigenceParticuliere
    ) {
        $this->authorize('update', $acheteNow);

        $acheteNow
            ->exigenceParticulieres()
            ->syncWithoutDetaching([$exigenceParticuliere->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AcheteNow $acheteNow
     * @param \App\Models\ExigenceParticuliere $exigenceParticuliere
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        AcheteNow $acheteNow,
        ExigenceParticuliere $exigenceParticuliere
    ) {
        $this->authorize('update', $acheteNow);

        $acheteNow->exigenceParticulieres()->detach($exigenceParticuliere);

        return response()->noContent();
    }
}
