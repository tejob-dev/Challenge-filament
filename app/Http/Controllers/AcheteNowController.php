<?php

namespace App\Http\Controllers;

use App\Models\AcheteNow;
use App\Models\EtatAchat;
use Illuminate\Http\Request;
use App\Models\SurfaceAnnexe;
use App\Models\ExigenceParticuliere;
use App\Http\Requests\AcheteNowStoreRequest;
use App\Http\Requests\AcheteNowUpdateRequest;

class AcheteNowController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', AcheteNow::class);

        $search = $request->get('search', '');

        $acheteNows = AcheteNow::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.achete_nows.index', compact('acheteNows', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', AcheteNow::class);

        return view('app.achete_nows.create');
    }

    /**
     * @param \App\Http\Requests\AcheteNowStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AcheteNowStoreRequest $request)
    {
        $this->authorize('create', AcheteNow::class);

        $validated = $request->validated();

        $acheteNow = AcheteNow::create($validated);

        return redirect()
            ->route('achete-nows.edit', $acheteNow)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AcheteNow $acheteNow
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AcheteNow $acheteNow)
    {
        $this->authorize('view', $acheteNow);

        return view('app.achete_nows.show', compact('acheteNow'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AcheteNow $acheteNow
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AcheteNow $acheteNow)
    {
        $this->authorize('update', $acheteNow);

        $etatAchats = EtatAchat::get();
        $surfaceAnnexes = SurfaceAnnexe::get();
        $exigenceParticulieres = ExigenceParticuliere::get();

        return view(
            'app.achete_nows.edit',
            compact(
                'acheteNow',
                'etatAchats',
                'surfaceAnnexes',
                'exigenceParticulieres'
            )
        );
    }

    /**
     * @param \App\Http\Requests\AcheteNowUpdateRequest $request
     * @param \App\Models\AcheteNow $acheteNow
     * @return \Illuminate\Http\Response
     */
    public function update(
        AcheteNowUpdateRequest $request,
        AcheteNow $acheteNow
    ) {
        $this->authorize('update', $acheteNow);

        $validated = $request->validated();
        $acheteNow->etatAchats()->sync($request->etatAchats);
        $acheteNow->surfaceAnnexes()->sync($request->surfaceAnnexes);
        $acheteNow
            ->exigenceParticulieres()
            ->sync($request->exigenceParticulieres);

        $acheteNow->update($validated);

        return redirect()
            ->route('achete-nows.edit', $acheteNow)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AcheteNow $acheteNow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, AcheteNow $acheteNow)
    {
        $this->authorize('delete', $acheteNow);

        $acheteNow->delete();

        return redirect()
            ->route('achete-nows.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
