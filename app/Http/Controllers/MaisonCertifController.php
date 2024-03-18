<?php

namespace App\Http\Controllers;

use App\Models\MaisonCertif;
use Illuminate\Http\Request;
use App\Models\TypeDeSurface;
use App\Models\CritereImmeuble;
use App\Models\ExigenceImmeuble;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.maison_certifs.index',
            compact('maisonCertifs', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', MaisonCertif::class);

        return view('app.maison_certifs.create');
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

        return redirect()
            ->route('maison-certifs.edit', $maisonCertif)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MaisonCertif $maisonCertif
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, MaisonCertif $maisonCertif)
    {
        $this->authorize('view', $maisonCertif);

        return view('app.maison_certifs.show', compact('maisonCertif'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MaisonCertif $maisonCertif
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MaisonCertif $maisonCertif)
    {
        $this->authorize('update', $maisonCertif);

        $typeDeSurfaces = TypeDeSurface::get();
        $critereImmeubles = CritereImmeuble::get();
        $exigenceImmeubles = ExigenceImmeuble::get();

        return view(
            'app.maison_certifs.edit',
            compact(
                'maisonCertif',
                'typeDeSurfaces',
                'critereImmeubles',
                'exigenceImmeubles'
            )
        );
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
        $maisonCertif->typeDeSurfaces()->sync($request->typeDeSurfaces);
        $maisonCertif->critereImmeubles()->sync($request->critereImmeubles);
        $maisonCertif->exigenceImmeubles()->sync($request->exigenceImmeubles);

        $maisonCertif->update($validated);

        return redirect()
            ->route('maison-certifs.edit', $maisonCertif)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('maison-certifs.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
