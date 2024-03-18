<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\SurfaceAnnexe;
use App\Http\Controllers\Controller;
use App\Http\Resources\SurfaceAnnexeResource;
use App\Http\Resources\SurfaceAnnexeCollection;
use App\Http\Requests\SurfaceAnnexeStoreRequest;
use App\Http\Requests\SurfaceAnnexeUpdateRequest;

class SurfaceAnnexeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', SurfaceAnnexe::class);

        $search = $request->get('search', '');

        $surfaceAnnexes = SurfaceAnnexe::search($search)
            ->latest()
            ->paginate();

        return new SurfaceAnnexeCollection($surfaceAnnexes);
    }

    /**
     * @param \App\Http\Requests\SurfaceAnnexeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SurfaceAnnexeStoreRequest $request)
    {
        $this->authorize('create', SurfaceAnnexe::class);

        $validated = $request->validated();

        $surfaceAnnexe = SurfaceAnnexe::create($validated);

        return new SurfaceAnnexeResource($surfaceAnnexe);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SurfaceAnnexe $surfaceAnnexe
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, SurfaceAnnexe $surfaceAnnexe)
    {
        $this->authorize('view', $surfaceAnnexe);

        return new SurfaceAnnexeResource($surfaceAnnexe);
    }

    /**
     * @param \App\Http\Requests\SurfaceAnnexeUpdateRequest $request
     * @param \App\Models\SurfaceAnnexe $surfaceAnnexe
     * @return \Illuminate\Http\Response
     */
    public function update(
        SurfaceAnnexeUpdateRequest $request,
        SurfaceAnnexe $surfaceAnnexe
    ) {
        $this->authorize('update', $surfaceAnnexe);

        $validated = $request->validated();

        $surfaceAnnexe->update($validated);

        return new SurfaceAnnexeResource($surfaceAnnexe);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SurfaceAnnexe $surfaceAnnexe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, SurfaceAnnexe $surfaceAnnexe)
    {
        $this->authorize('delete', $surfaceAnnexe);

        $surfaceAnnexe->delete();

        return response()->noContent();
    }
}
