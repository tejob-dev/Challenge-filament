<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CritereImmeuble;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.critere_immeubles.index',
            compact('critereImmeubles', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', CritereImmeuble::class);

        return view('app.critere_immeubles.create');
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

        return redirect()
            ->route('critere-immeubles.edit', $critereImmeuble)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CritereImmeuble $critereImmeuble
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CritereImmeuble $critereImmeuble)
    {
        $this->authorize('view', $critereImmeuble);

        return view('app.critere_immeubles.show', compact('critereImmeuble'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CritereImmeuble $critereImmeuble
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CritereImmeuble $critereImmeuble)
    {
        $this->authorize('update', $critereImmeuble);

        return view('app.critere_immeubles.edit', compact('critereImmeuble'));
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

        return redirect()
            ->route('critere-immeubles.edit', $critereImmeuble)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('critere-immeubles.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
