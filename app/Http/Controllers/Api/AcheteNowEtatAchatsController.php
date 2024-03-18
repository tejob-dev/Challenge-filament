<?php
namespace App\Http\Controllers\Api;

use App\Models\AcheteNow;
use App\Models\EtatAchat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EtatAchatCollection;

class AcheteNowEtatAchatsController extends Controller
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

        $etatAchats = $acheteNow
            ->etatAchats()
            ->search($search)
            ->latest()
            ->paginate();

        return new EtatAchatCollection($etatAchats);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AcheteNow $acheteNow
     * @param \App\Models\EtatAchat $etatAchat
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        AcheteNow $acheteNow,
        EtatAchat $etatAchat
    ) {
        $this->authorize('update', $acheteNow);

        $acheteNow->etatAchats()->syncWithoutDetaching([$etatAchat->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AcheteNow $acheteNow
     * @param \App\Models\EtatAchat $etatAchat
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        AcheteNow $acheteNow,
        EtatAchat $etatAchat
    ) {
        $this->authorize('update', $acheteNow);

        $acheteNow->etatAchats()->detach($etatAchat);

        return response()->noContent();
    }
}
