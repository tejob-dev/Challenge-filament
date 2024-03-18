<?php

namespace App\Http\Controllers\Api;

use App\Models\AcheteNow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AcheteNowResource;
use App\Http\Resources\AcheteNowCollection;
use App\Http\Requests\AcheteNowStoreRequest;
use App\Http\Requests\AcheteNowUpdateRequest;

class AcheteNowController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', AcheteNow::class);

        $search = $request->get('search', '');

        $acheteNows = AcheteNow::search($search)
            ->latest()
            ->paginate();

        return new AcheteNowCollection($acheteNows);
    }

    /**
     * @param \App\Http\Requests\AcheteNowStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AcheteNowStoreRequest $request)
    {
        $this->authorize('create', AcheteNow::class);

        $validated = $request->validated();

        $acheteNow = AcheteNow::create($validated);

        return new AcheteNowResource($acheteNow);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AcheteNow $acheteNow
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AcheteNow $acheteNow)
    {
        $this->authorize('view', $acheteNow);

        return new AcheteNowResource($acheteNow);
    }

    /**
     * @param \App\Http\Requests\AcheteNowUpdateRequest $request
     * @param \App\Models\AcheteNow $acheteNow
     * @return \Illuminate\Http\Response
     */
    public function update(
        AcheteNowUpdateRequest $request,
        AcheteNow $acheteNow
    ) {
        $this->authorize('update', $acheteNow);

        $validated = $request->validated();

        $acheteNow->update($validated);

        return new AcheteNowResource($acheteNow);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AcheteNow $acheteNow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, AcheteNow $acheteNow)
    {
        $this->authorize('delete', $acheteNow);

        $acheteNow->delete();

        return response()->noContent();
    }
}
