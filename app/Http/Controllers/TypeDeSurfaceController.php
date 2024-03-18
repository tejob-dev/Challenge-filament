<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeDeSurface;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.type_de_surfaces.index',
            compact('typeDeSurfaces', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', TypeDeSurface::class);

        return view('app.type_de_surfaces.create');
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

        return redirect()
            ->route('type-de-surfaces.edit', $typeDeSurface)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TypeDeSurface $typeDeSurface
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TypeDeSurface $typeDeSurface)
    {
        $this->authorize('view', $typeDeSurface);

        return view('app.type_de_surfaces.show', compact('typeDeSurface'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TypeDeSurface $typeDeSurface
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TypeDeSurface $typeDeSurface)
    {
        $this->authorize('update', $typeDeSurface);

        return view('app.type_de_surfaces.edit', compact('typeDeSurface'));
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

        return redirect()
            ->route('type-de-surfaces.edit', $typeDeSurface)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('type-de-surfaces.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
