<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\TypeCertification;
use App\Http\Controllers\Controller;
use App\Http\Resources\TypeCertificationResource;
use App\Http\Resources\TypeCertificationCollection;
use App\Http\Requests\TypeCertificationStoreRequest;
use App\Http\Requests\TypeCertificationUpdateRequest;

class TypeCertificationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', TypeCertification::class);

        $search = $request->get('search', '');

        $typeCertifications = TypeCertification::search($search)
            ->latest()
            ->paginate();

        return new TypeCertificationCollection($typeCertifications);
    }

    /**
     * @param \App\Http\Requests\TypeCertificationStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeCertificationStoreRequest $request)
    {
        $this->authorize('create', TypeCertification::class);

        $validated = $request->validated();

        $typeCertification = TypeCertification::create($validated);

        return new TypeCertificationResource($typeCertification);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TypeCertification $typeCertification
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TypeCertification $typeCertification)
    {
        $this->authorize('view', $typeCertification);

        return new TypeCertificationResource($typeCertification);
    }

    /**
     * @param \App\Http\Requests\TypeCertificationUpdateRequest $request
     * @param \App\Models\TypeCertification $typeCertification
     * @return \Illuminate\Http\Response
     */
    public function update(
        TypeCertificationUpdateRequest $request,
        TypeCertification $typeCertification
    ) {
        $this->authorize('update', $typeCertification);

        $validated = $request->validated();

        $typeCertification->update($validated);

        return new TypeCertificationResource($typeCertification);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TypeCertification $typeCertification
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        TypeCertification $typeCertification
    ) {
        $this->authorize('delete', $typeCertification);

        $typeCertification->delete();

        return response()->noContent();
    }
}
