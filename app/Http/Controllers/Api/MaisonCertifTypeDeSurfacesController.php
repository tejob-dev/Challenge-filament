<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\MaisonCertif;
use App\Models\TypeDeSurface;
use App\Http\Controllers\Controller;
use App\Http\Resources\TypeDeSurfaceCollection;

class MaisonCertifTypeDeSurfacesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MaisonCertif $maisonCertif
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, MaisonCertif $maisonCertif)
    {
        $this->authorize('view', $maisonCertif);

        $search = $request->get('search', '');

        $typeDeSurfaces = $maisonCertif
            ->typeDeSurfaces()
            ->search($search)
            ->latest()
            ->paginate();

        return new TypeDeSurfaceCollection($typeDeSurfaces);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MaisonCertif $maisonCertif
     * @param \App\Models\TypeDeSurface $typeDeSurface
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        MaisonCertif $maisonCertif,
        TypeDeSurface $typeDeSurface
    ) {
        $this->authorize('update', $maisonCertif);

        $maisonCertif
            ->typeDeSurfaces()
            ->syncWithoutDetaching([$typeDeSurface->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MaisonCertif $maisonCertif
     * @param \App\Models\TypeDeSurface $typeDeSurface
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        MaisonCertif $maisonCertif,
        TypeDeSurface $typeDeSurface
    ) {
        $this->authorize('update', $maisonCertif);

        $maisonCertif->typeDeSurfaces()->detach($typeDeSurface);

        return response()->noContent();
    }
}
