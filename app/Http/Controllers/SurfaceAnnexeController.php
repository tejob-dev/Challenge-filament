<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SurfaceAnnexe;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.surface_annexes.index',
            compact('surfaceAnnexes', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', SurfaceAnnexe::class);

        return view('app.surface_annexes.create');
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

        return redirect()
            ->route('surface-annexes.edit', $surfaceAnnexe)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SurfaceAnnexe $surfaceAnnexe
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, SurfaceAnnexe $surfaceAnnexe)
    {
        $this->authorize('view', $surfaceAnnexe);

        return view('app.surface_annexes.show', compact('surfaceAnnexe'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SurfaceAnnexe $surfaceAnnexe
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, SurfaceAnnexe $surfaceAnnexe)
    {
        $this->authorize('update', $surfaceAnnexe);

        return view('app.surface_annexes.edit', compact('surfaceAnnexe'));
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

        return redirect()
            ->route('surface-annexes.edit', $surfaceAnnexe)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('surface-annexes.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
