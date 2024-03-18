<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\TypeDeSurface;
use App\Http\Controllers\Controller;
use App\Http\Resources\TypeDeSurfaceResource;
use App\Http\Resources\TypeDeSurfaceCollection;
use App\Http\Requests\TypeDeSurfaceStoreRequest;
use App\Http\Requests\TypeDeSurfaceUpdateRequest;

class TypeDeSurfaceController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', TypeDeSurface::class);

        $search = $request->get('search', '');

        $typeDeSurfaces = TypeDeSurface::search($search)
            ->latest()
            ->paginate();

        return new TypeDeSurfaceCollection($typeDeSurfaces);
    }

    /**
     * @param \App\Http\Requests\TypeDeSurfaceStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeDeSurfaceStoreRequest $request)
    {
        $this->authorize('create', TypeDeSurface::class);

        $validated = $request->validated();

        $typeDeSurface = TypeDeSurface::create($validated);

        return new TypeDeSurfaceResource($typeDeSurface);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TypeDeSurface $typeDeSurface
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TypeDeSurface $typeDeSurface)
    {
        $this->authorize('view', $typeDeSurface);

        return new TypeDeSurfaceResource($typeDeSurface);
    }

    /**
     * @param \App\Http\Requests\TypeDeSurfaceUpdateRequest $request
     * @param \App\Models\TypeDeSurface $typeDeSurface
     * @return \Illuminate\Http\Response
     */
    public function update(
        TypeDeSurfaceUpdateRequest $request,
        TypeDeSurface $typeDeSurface
    ) {
        $this->authorize('update', $typeDeSurface);

        $validated = $request->validated();

        $typeDeSurface->update($validated);

        return new TypeDeSurfaceResource($typeDeSurface);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TypeDeSurface $typeDeSurface
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TypeDeSurface $typeDeSurface)
    {
        $this->authorize('delete', $typeDeSurface);

        $typeDeSurface->delete();

        return response()->noContent();
    }
}
