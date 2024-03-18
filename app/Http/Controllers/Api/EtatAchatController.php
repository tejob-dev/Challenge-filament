<?php

namespace App\Http\Controllers\Api;

use App\Models\EtatAchat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EtatAchatResource;
use App\Http\Resources\EtatAchatCollection;
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
            ->paginate();

        return new EtatAchatCollection($etatAchats);
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

        return new EtatAchatResource($etatAchat);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EtatAchat $etatAchat
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, EtatAchat $etatAchat)
    {
        $this->authorize('view', $etatAchat);

        return new EtatAchatResource($etatAchat);
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

        return new EtatAchatResource($etatAchat);
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

        return response()->noContent();
    }
}
