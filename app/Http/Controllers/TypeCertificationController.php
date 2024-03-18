<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeCertification;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.type_certifications.index',
            compact('typeCertifications', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', TypeCertification::class);

        return view('app.type_certifications.create');
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

        return redirect()
            ->route('type-certifications.edit', $typeCertification)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TypeCertification $typeCertification
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TypeCertification $typeCertification)
    {
        $this->authorize('view', $typeCertification);

        return view(
            'app.type_certifications.show',
            compact('typeCertification')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TypeCertification $typeCertification
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TypeCertification $typeCertification)
    {
        $this->authorize('update', $typeCertification);

        return view(
            'app.type_certifications.edit',
            compact('typeCertification')
        );
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

        return redirect()
            ->route('type-certifications.edit', $typeCertification)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('type-certifications.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
