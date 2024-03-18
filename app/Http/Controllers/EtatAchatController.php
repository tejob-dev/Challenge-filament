<?php

namespace App\Http\Controllers;

use App\Models\EtatAchat;
use Illuminate\Http\Request;
use App\Http\Requests\EtatAchatStoreRequest;
use App\Http\Requests\EtatAchatUpdateRequest;

class EtatAchatController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', EtatAchat::class);

        $search = $request->get('search', '');

        $etatAchats = EtatAchat::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.etat_achats.index', compact('etatAchats', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', EtatAchat::class);

        return view('app.etat_achats.create');
    }

    /**
     * @param \App\Http\Requests\EtatAchatStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EtatAchatStoreRequest $request)
    {
        $this->authorize('create', EtatAchat::class);

        $validated = $request->validated();

        $etatAchat = EtatAchat::create($validated);

        return redirect()
            ->route('etat-achats.edit', $etatAchat)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EtatAchat $etatAchat
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, EtatAchat $etatAchat)
    {
        $this->authorize('view', $etatAchat);

        return view('app.etat_achats.show', compact('etatAchat'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EtatAchat $etatAchat
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, EtatAchat $etatAchat)
    {
        $this->authorize('update', $etatAchat);

        return view('app.etat_achats.edit', compact('etatAchat'));
    }

    /**
     * @param \App\Http\Requests\EtatAchatUpdateRequest $request
     * @param \App\Models\EtatAchat $etatAchat
     * @return \Illuminate\Http\Response
     */
    public function update(
        EtatAchatUpdateRequest $request,
        EtatAchat $etatAchat
    ) {
        $this->authorize('update', $etatAchat);

        $validated = $request->validated();

        $etatAchat->update($validated);

        return redirect()
            ->route('etat-achats.edit', $etatAchat)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EtatAchat $etatAchat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, EtatAchat $etatAchat)
    {
        $this->authorize('delete', $etatAchat);

        $etatAchat->delete();

        return redirect()
            ->route('etat-achats.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
