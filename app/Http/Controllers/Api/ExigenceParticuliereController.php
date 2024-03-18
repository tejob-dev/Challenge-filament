<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ExigenceParticuliere;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExigenceParticuliereResource;
use App\Http\Resources\ExigenceParticuliereCollection;
use App\Http\Requests\ExigenceParticuliereStoreRequest;
use App\Http\Requests\ExigenceParticuliereUpdateRequest;

class ExigenceParticuliereController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ExigenceParticuliere::class);

        $search = $request->get('search', '');

        $exigenceParticulieres = ExigenceParticuliere::search($search)
            ->latest()
            ->paginate();

        return new ExigenceParticuliereCollection($exigenceParticulieres);
    }

    /**
     * @param \App\Http\Requests\ExigenceParticuliereStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExigenceParticuliereStoreRequest $request)
    {
        $this->authorize('create', ExigenceParticuliere::class);

        $validated = $request->validated();

        $exigenceParticuliere = ExigenceParticuliere::create($validated);

        return new ExigenceParticuliereResource($exigenceParticuliere);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ExigenceParticuliere $exigenceParticuliere
     * @return \Illuminate\Http\Response
     */
    public function show(
        Request $request,
        ExigenceParticuliere $exigenceParticuliere
    ) {
        $this->authorize('view', $exigenceParticuliere);

        return new ExigenceParticuliereResource($exigenceParticuliere);
    }

    /**
     * @param \App\Http\Requests\ExigenceParticuliereUpdateRequest $request
     * @param \App\Models\ExigenceParticuliere $exigenceParticuliere
     * @return \Illuminate\Http\Response
     */
    public function update(
        ExigenceParticuliereUpdateRequest $request,
        ExigenceParticuliere $exigenceParticuliere
    ) {
        $this->authorize('update', $exigenceParticuliere);

        $validated = $request->validated();

        $exigenceParticuliere->update($validated);

        return new ExigenceParticuliereResource($exigenceParticuliere);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ExigenceParticuliere $exigenceParticuliere
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        ExigenceParticuliere $exigenceParticuliere
    ) {
        $this->authorize('delete', $exigenceParticuliere);

        $exigenceParticuliere->delete();

        return response()->noContent();
    }
}
