<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Certification;
use App\Models\TypeCertification;
use App\Http\Controllers\Controller;
use App\Http\Resources\TypeCertificationCollection;

class CertificationTypeCertificationsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Certification $certification
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Certification $certification)
    {
        $this->authorize('view', $certification);

        $search = $request->get('search', '');

        $typeCertifications = $certification
            ->typeCertifications()
            ->search($search)
            ->latest()
            ->paginate();

        return new TypeCertificationCollection($typeCertifications);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Certification $certification
     * @param \App\Models\TypeCertification $typeCertification
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        Certification $certification,
        TypeCertification $typeCertification
    ) {
        $this->authorize('update', $certification);

        $certification
            ->typeCertifications()
            ->syncWithoutDetaching([$typeCertification->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Certification $certification
     * @param \App\Models\TypeCertification $typeCertification
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        Certification $certification,
        TypeCertification $typeCertification
    ) {
        $this->authorize('update', $certification);

        $certification->typeCertifications()->detach($typeCertification);

        return response()->noContent();
    }
}
