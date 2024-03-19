<?php

namespace App\Http\Controllers;

use App\Models\RendezVous;
use Illuminate\Http\Request;
use App\Http\Requests\RendezVousStoreRequest;
use App\Http\Requests\RendezVousUpdateRequest;

class RendezVousController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', RendezVous::class);

        $search = $request->get('search', '');

        $allRendezVous = RendezVous::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.all_rendez_vous.index',
            compact('allRendezVous', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', RendezVous::class);

        return view('app.all_rendez_vous.create');
    }

    /**
     * @param \App\Http\Requests\RendezVousStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RendezVousStoreRequest $request)
    {
        $this->authorize('create', RendezVous::class);

        $validated = $request->validated();

        $rendezVous = RendezVous::create($validated);

        return redirect()
            ->route('all-rendez-vous.edit', $rendezVous)
            ->withSuccess(__('crud.common.created'));
    }
    
    /**
     * @param \App\Http\Requests\RendezVousStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function storeFront(RendezVousStoreRequest $request)
    {
        // $this->authorize('create', RendezVous::class);

        $validated = $request->validated();

        $rendezVous = RendezVous::create($validated);

        return view("frontend.op-success");
        // return redirect()
        //     ->route('all-rendez-vous.edit', $rendezVous)
        //     ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RendezVous $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RendezVous $rendezVous)
    {
        $this->authorize('view', $rendezVous);

        return view('app.all_rendez_vous.show', compact('rendezVous'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RendezVous $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RendezVous $rendezVous)
    {
        $this->authorize('update', $rendezVous);

        return view('app.all_rendez_vous.edit', compact('rendezVous'));
    }

    /**
     * @param \App\Http\Requests\RendezVousUpdateRequest $request
     * @param \App\Models\RendezVous $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function update(
        RendezVousUpdateRequest $request,
        RendezVous $rendezVous
    ) {
        $this->authorize('update', $rendezVous);

        $validated = $request->validated();

        $rendezVous->update($validated);

        return redirect()
            ->route('all-rendez-vous.edit', $rendezVous)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RendezVous $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, RendezVous $rendezVous)
    {
        $this->authorize('delete', $rendezVous);

        $rendezVous->delete();

        return redirect()
            ->route('all-rendez-vous.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
