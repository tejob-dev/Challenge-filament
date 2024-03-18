<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ExigenceImmeuble;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExigenceImmeubleResource;
use App\Http\Resources\ExigenceImmeubleCollection;
use App\Http\Requests\ExigenceImmeubleStoreRequest;
use App\Http\Requests\ExigenceImmeubleUpdateRequest;

class ExigenceImmeubleController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ExigenceImmeuble::class);

        $search = $request->get('search', '');

        $exigenceImmeubles = ExigenceImmeuble::search($search)
            ->latest()
            ->paginate();

        return new ExigenceImmeubleCollection($exigenceImmeubles);
    }

    /**
     * @param \App\Http\Requests\ExigenceImmeubleStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExigenceImmeubleStoreRequest $request)
    {
        $this->authorize('create', ExigenceImmeuble::class);

        $validated = $request->validated();

        $exigenceImmeuble = ExigenceImmeuble::create($validated);

        return new ExigenceImmeubleResource($exigenceImmeuble);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ExigenceImmeuble $exigenceImmeuble
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ExigenceImmeuble $exigenceImmeuble)
    {
        $this->authorize('view', $exigenceImmeuble);

        return new ExigenceImmeubleResource($exigenceImmeuble);
    }

    /**
     * @param \App\Http\Requests\ExigenceImmeubleUpdateRequest $request
     * @param \App\Models\ExigenceImmeuble $exigenceImmeuble
     * @return \Illuminate\Http\Response
     */
    public function update(
        ExigenceImmeubleUpdateRequest $request,
        ExigenceImmeuble $exigenceImmeuble
    ) {
        $this->authorize('update', $exigenceImmeuble);

        $validated = $request->validated();

        $exigenceImmeuble->update($validated);

        return new ExigenceImmeubleResource($exigenceImmeuble);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ExigenceImmeuble $exigenceImmeuble
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        ExigenceImmeuble $exigenceImmeuble
    ) {
        $this->authorize('delete', $exigenceImmeuble);

        $exigenceImmeuble->delete();

        return response()->noContent();
    }
}
