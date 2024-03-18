<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certification;
use App\Models\TypeCertification;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.certifications.index',
            compact('certifications', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Certification::class);

        return view('app.certifications.create');
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

        return redirect()
            ->route('certifications.edit', $certification)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Certification $certification
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Certification $certification)
    {
        $this->authorize('view', $certification);

        return view('app.certifications.show', compact('certification'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Certification $certification
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Certification $certification)
    {
        $this->authorize('update', $certification);

        $typeCertifications = TypeCertification::get();

        return view(
            'app.certifications.edit',
            compact('certification', 'typeCertifications')
        );
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
        $certification
            ->typeCertifications()
            ->sync($request->typeCertifications);

        $certification->update($validated);

        return redirect()
            ->route('certifications.edit', $certification)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('certifications.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
