<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExigenceImmeuble;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.exigence_immeubles.index',
            compact('exigenceImmeubles', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', ExigenceImmeuble::class);

        return view('app.exigence_immeubles.create');
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

        return redirect()
            ->route('exigence-immeubles.edit', $exigenceImmeuble)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ExigenceImmeuble $exigenceImmeuble
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ExigenceImmeuble $exigenceImmeuble)
    {
        $this->authorize('view', $exigenceImmeuble);

        return view('app.exigence_immeubles.show', compact('exigenceImmeuble'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ExigenceImmeuble $exigenceImmeuble
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ExigenceImmeuble $exigenceImmeuble)
    {
        $this->authorize('update', $exigenceImmeuble);

        return view('app.exigence_immeubles.edit', compact('exigenceImmeuble'));
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

        return redirect()
            ->route('exigence-immeubles.edit', $exigenceImmeuble)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('exigence-immeubles.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
