<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\CritereImmeuble;
use App\Http\Controllers\Controller;
use App\Http\Resources\CritereImmeubleResource;
use App\Http\Resources\CritereImmeubleCollection;
use App\Http\Requests\CritereImmeubleStoreRequest;
use App\Http\Requests\CritereImmeubleUpdateRequest;

class CritereImmeubleController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', CritereImmeuble::class);

        $search = $request->get('search', '');

        $critereImmeubles = CritereImmeuble::search($search)
            ->latest()
            ->paginate();

        return new CritereImmeubleCollection($critereImmeubles);
    }

    /**
     * @param \App\Http\Requests\CritereImmeubleStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CritereImmeubleStoreRequest $request)
    {
        $this->authorize('create', CritereImmeuble::class);

        $validated = $request->validated();

        $critereImmeuble = CritereImmeuble::create($validated);

        return new CritereImmeubleResource($critereImmeuble);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CritereImmeuble $critereImmeuble
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CritereImmeuble $critereImmeuble)
    {
        $this->authorize('view', $critereImmeuble);

        return new CritereImmeubleResource($critereImmeuble);
    }

    /**
     * @param \App\Http\Requests\CritereImmeubleUpdateRequest $request
     * @param \App\Models\CritereImmeuble $critereImmeuble
     * @return \Illuminate\Http\Response
     */
    public function update(
        CritereImmeubleUpdateRequest $request,
        CritereImmeuble $critereImmeuble
    ) {
        $this->authorize('update', $critereImmeuble);

        $validated = $request->validated();

        $critereImmeuble->update($validated);

        return new CritereImmeubleResource($critereImmeuble);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CritereImmeuble $critereImmeuble
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CritereImmeuble $critereImmeuble)
    {
        $this->authorize('delete', $critereImmeuble);

        $critereImmeuble->delete();

        return response()->noContent();
    }
}
