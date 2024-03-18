<?php

namespace App\Http\Controllers\Api;

use App\Models\MaisonCertif;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MaisonCertifResource;
use App\Http\Resources\MaisonCertifCollection;
use App\Http\Requests\MaisonCertifStoreRequest;
use App\Http\Requests\MaisonCertifUpdateRequest;

class MaisonCertifController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', MaisonCertif::class);

        $search = $request->get('search', '');

        $maisonCertifs = MaisonCertif::search($search)
            ->latest()
            ->paginate();

        return new MaisonCertifCollection($maisonCertifs);
    }

    /**
     * @param \App\Http\Requests\MaisonCertifStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MaisonCertifStoreRequest $request)
    {
        $this->authorize('create', MaisonCertif::class);

        $validated = $request->validated();

        $maisonCertif = MaisonCertif::create($validated);

        return new MaisonCertifResource($maisonCertif);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MaisonCertif $maisonCertif
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, MaisonCertif $maisonCertif)
    {
        $this->authorize('view', $maisonCertif);

        return new MaisonCertifResource($maisonCertif);
    }

    /**
     * @param \App\Http\Requests\MaisonCertifUpdateRequest $request
     * @param \App\Models\MaisonCertif $maisonCertif
     * @return \Illuminate\Http\Response
     */
    public function update(
        MaisonCertifUpdateRequest $request,
        MaisonCertif $maisonCertif
    ) {
        $this->authorize('update', $maisonCertif);

        $validated = $request->validated();

        $maisonCertif->update($validated);

        return new MaisonCertifResource($maisonCertif);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MaisonCertif $maisonCertif
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, MaisonCertif $maisonCertif)
    {
        $this->authorize('delete', $maisonCertif);

        $maisonCertif->delete();

        return response()->noContent();
    }
}
