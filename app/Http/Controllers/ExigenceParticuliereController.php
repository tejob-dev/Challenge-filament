<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExigenceParticuliere;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.exigence_particulieres.index',
            compact('exigenceParticulieres', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', ExigenceParticuliere::class);

        return view('app.exigence_particulieres.create');
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

        return redirect()
            ->route('exigence-particulieres.edit', $exigenceParticuliere)
            ->withSuccess(__('crud.common.created'));
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

        return view(
            'app.exigence_particulieres.show',
            compact('exigenceParticuliere')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ExigenceParticuliere $exigenceParticuliere
     * @return \Illuminate\Http\Response
     */
    public function edit(
        Request $request,
        ExigenceParticuliere $exigenceParticuliere
    ) {
        $this->authorize('update', $exigenceParticuliere);

        return view(
            'app.exigence_particulieres.edit',
            compact('exigenceParticuliere')
        );
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

        return redirect()
            ->route('exigence-particulieres.edit', $exigenceParticuliere)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('exigence-particulieres.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
