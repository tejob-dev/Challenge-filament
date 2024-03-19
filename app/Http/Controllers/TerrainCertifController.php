<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TerrainCertif;
use App\Http\Requests\TerrainCertifStoreRequest;
use App\Http\Requests\TerrainCertifUpdateRequest;

class TerrainCertifController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', TerrainCertif::class);

        $search = $request->get('search', '');

        $terrainCertifs = TerrainCertif::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.terrain_certifs.index',
            compact('terrainCertifs', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', TerrainCertif::class);

        return view('app.terrain_certifs.create');
    }

    /**
     * @param \App\Http\Requests\TerrainCertifStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TerrainCertifStoreRequest $request)
    {
        $this->authorize('create', TerrainCertif::class);

        $validated = $request->validated();

        $terrainCertif = TerrainCertif::create($validated);

        return redirect()
            ->route('terrain-certifs.edit', $terrainCertif)
            ->withSuccess(__('crud.common.created'));
    }
    
    /**
     * @param \App\Http\Requests\TerrainCertifStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function storeFront(TerrainCertifStoreRequest $request)
    {
        // $this->authorize('create', TerrainCertif::class);

        $validated = $request->validated();

        $terrainCertif = TerrainCertif::create($validated);

        return view("frontend.op-success");
        // redirect()
        //     ->route('terrain-certifs.edit', $terrainCertif)
        //     ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TerrainCertif $terrainCertif
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TerrainCertif $terrainCertif)
    {
        $this->authorize('view', $terrainCertif);

        return view('app.terrain_certifs.show', compact('terrainCertif'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TerrainCertif $terrainCertif
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TerrainCertif $terrainCertif)
    {
        $this->authorize('update', $terrainCertif);

        return view('app.terrain_certifs.edit', compact('terrainCertif'));
    }

    /**
     * @param \App\Http\Requests\TerrainCertifUpdateRequest $request
     * @param \App\Models\TerrainCertif $terrainCertif
     * @return \Illuminate\Http\Response
     */
    public function update(
        TerrainCertifUpdateRequest $request,
        TerrainCertif $terrainCertif
    ) {
        $this->authorize('update', $terrainCertif);

        $validated = $request->validated();

        $terrainCertif->update($validated);

        return redirect()
            ->route('terrain-certifs.edit', $terrainCertif)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TerrainCertif $terrainCertif
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TerrainCertif $terrainCertif)
    {
        $this->authorize('delete', $terrainCertif);

        $terrainCertif->delete();

        return redirect()
            ->route('terrain-certifs.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
