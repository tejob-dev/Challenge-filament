<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Certification;
use App\Http\Controllers\Controller;
use App\Http\Resources\CertificationResource;
use App\Http\Resources\CertificationCollection;
use App\Http\Requests\CertificationStoreRequest;
use App\Http\Requests\CertificationUpdateRequest;

class CertificationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Certification::class);

        $search = $request->get('search', '');

        $certifications = Certification::search($search)
            ->latest()
            ->paginate();

        return new CertificationCollection($certifications);
    }

    /**
     * @param \App\Http\Requests\CertificationStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CertificationStoreRequest $request)
    {
        $this->authorize('create', Certification::class);

        $validated = $request->validated();

        $certification = Certification::create($validated);

        return new CertificationResource($certification);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Certification $certification
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Certification $certification)
    {
        $this->authorize('view', $certification);

        return new CertificationResource($certification);
    }

    /**
     * @param \App\Http\Requests\CertificationUpdateRequest $request
     * @param \App\Models\Certification $certification
     * @return \Illuminate\Http\Response
     */
    public function update(
        CertificationUpdateRequest $request,
        Certification $certification
    ) {
        $this->authorize('update', $certification);

        $validated = $request->validated();

        $certification->update($validated);

        return new CertificationResource($certification);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Certification $certification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Certification $certification)
    {
        $this->authorize('delete', $certification);

        $certification->delete();

        return response()->noContent();
    }
}
