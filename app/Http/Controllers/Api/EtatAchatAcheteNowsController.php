<?php
namespace App\Http\Controllers\Api;

use App\Models\EtatAchat;
use App\Models\AcheteNow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AcheteNowCollection;

class EtatAchatAcheteNowsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EtatAchat $etatAchat
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, EtatAchat $etatAchat)
    {
        $this->authorize('view', $etatAchat);

        $search = $request->get('search', '');

        $acheteNows = $etatAchat
            ->acheteNows()
            ->search($search)
            ->latest()
            ->paginate();

        return new AcheteNowCollection($acheteNows);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EtatAchat $etatAchat
     * @param \App\Models\AcheteNow $acheteNow
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        EtatAchat $etatAchat,
        AcheteNow $acheteNow
    ) {
        $this->authorize('update', $etatAchat);

        $etatAchat->acheteNows()->syncWithoutDetaching([$acheteNow->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EtatAchat $etatAchat
     * @param \App\Models\AcheteNow $acheteNow
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        EtatAchat $etatAchat,
        AcheteNow $acheteNow
    ) {
        $this->authorize('update', $etatAchat);

        $etatAchat->acheteNows()->detach($acheteNow);

        return response()->noContent();
    }
}
