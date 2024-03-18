<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\TerrainCertif;
use App\Http\Controllers\Controller;
use App\Http\Resources\TerrainCertifResource;
use App\Http\Resources\TerrainCertifCollection;
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
            ->paginate();

        return new TerrainCertifCollection($terrainCertifs);
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

        return new TerrainCertifResource($terrainCertif);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TerrainCertif $terrainCertif
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TerrainCertif $terrainCertif)
    {
        $this->authorize('view', $terrainCertif);

        return new TerrainCertifResource($terrainCertif);
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

        return new TerrainCertifResource($terrainCertif);
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

        return response()->noContent();
    }
}
