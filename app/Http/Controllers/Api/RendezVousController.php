<?php

namespace App\Http\Controllers\Api;

use App\Models\RendezVous;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RendezVousResource;
use App\Http\Resources\RendezVousCollection;
use App\Http\Requests\RendezVousStoreRequest;
use App\Http\Requests\RendezVousUpdateRequest;

class RendezVousController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', RendezVous::class);

        $search = $request->get('search', '');

        $allRendezVous = RendezVous::search($search)
            ->latest()
            ->paginate();

        return new RendezVousCollection($allRendezVous);
    }

    /**
     * @param \App\Http\Requests\RendezVousStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RendezVousStoreRequest $request)
    {
        $this->authorize('create', RendezVous::class);

        $validated = $request->validated();

        $rendezVous = RendezVous::create($validated);

        return new RendezVousResource($rendezVous);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RendezVous $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RendezVous $rendezVous)
    {
        $this->authorize('view', $rendezVous);

        return new RendezVousResource($rendezVous);
    }

    /**
     * @param \App\Http\Requests\RendezVousUpdateRequest $request
     * @param \App\Models\RendezVous $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function update(
        RendezVousUpdateRequest $request,
        RendezVous $rendezVous
    ) {
        $this->authorize('update', $rendezVous);

        $validated = $request->validated();

        $rendezVous->update($validated);

        return new RendezVousResource($rendezVous);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RendezVous $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, RendezVous $rendezVous)
    {
        $this->authorize('delete', $rendezVous);

        $rendezVous->delete();

        return response()->noContent();
    }
}
