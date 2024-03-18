<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\MaisonCertif;
use App\Models\TypeDeSurface;
use App\Http\Controllers\Controller;
use App\Http\Resources\MaisonCertifCollection;

class TypeDeSurfaceMaisonCertifsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TypeDeSurface $typeDeSurface
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, TypeDeSurface $typeDeSurface)
    {
        $this->authorize('view', $typeDeSurface);

        $search = $request->get('search', '');

        $maisonCertifs = $typeDeSurface
            ->maisonCertifs()
            ->search($search)
            ->latest()
            ->paginate();

        return new MaisonCertifCollection($maisonCertifs);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TypeDeSurface $typeDeSurface
     * @param \App\Models\MaisonCertif $maisonCertif
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        TypeDeSurface $typeDeSurface,
        MaisonCertif $maisonCertif
    ) {
        $this->authorize('update', $typeDeSurface);

        $typeDeSurface
            ->maisonCertifs()
            ->syncWithoutDetaching([$maisonCertif->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TypeDeSurface $typeDeSurface
     * @param \App\Models\MaisonCertif $maisonCertif
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        TypeDeSurface $typeDeSurface,
        MaisonCertif $maisonCertif
    ) {
        $this->authorize('update', $typeDeSurface);

        $typeDeSurface->maisonCertifs()->detach($maisonCertif);

        return response()->noContent();
    }
}
