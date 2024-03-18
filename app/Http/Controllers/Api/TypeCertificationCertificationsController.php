<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Certification;
use App\Models\TypeCertification;
use App\Http\Controllers\Controller;
use App\Http\Resources\CertificationCollection;

class TypeCertificationCertificationsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TypeCertification $typeCertification
     * @return \Illuminate\Http\Response
     */
    public function index(
        Request $request,
        TypeCertification $typeCertification
    ) {
        $this->authorize('view', $typeCertification);

        $search = $request->get('search', '');

        $certifications = $typeCertification
            ->certifications()
            ->search($search)
            ->latest()
            ->paginate();

        return new CertificationCollection($certifications);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TypeCertification $typeCertification
     * @param \App\Models\Certification $certification
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        TypeCertification $typeCertification,
        Certification $certification
    ) {
        $this->authorize('update', $typeCertification);

        $typeCertification
            ->certifications()
            ->syncWithoutDetaching([$certification->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TypeCertification $typeCertification
     * @param \App\Models\Certification $certification
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        TypeCertification $typeCertification,
        Certification $certification
    ) {
        $this->authorize('update', $typeCertification);

        $typeCertification->certifications()->detach($certification);

        return response()->noContent();
    }
}
