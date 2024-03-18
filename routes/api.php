<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\AcheteNowController;
use App\Http\Controllers\Api\EtatAchatController;
use App\Http\Controllers\Api\RendezVousController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\MaisonCertifController;
use App\Http\Controllers\Api\TypeDeSurfaceController;
use App\Http\Controllers\Api\TerrainCertifController;
use App\Http\Controllers\Api\CertificationController;
use App\Http\Controllers\Api\SurfaceAnnexeController;
use App\Http\Controllers\Api\CritereImmeubleController;
use App\Http\Controllers\Api\ExigenceImmeubleController;
use App\Http\Controllers\Api\TypeCertificationController;
use App\Http\Controllers\Api\AcheteNowEtatAchatsController;
use App\Http\Controllers\Api\EtatAchatAcheteNowsController;
use App\Http\Controllers\Api\ExigenceParticuliereController;
use App\Http\Controllers\Api\AcheteNowSurfaceAnnexesController;
use App\Http\Controllers\Api\SurfaceAnnexeAcheteNowsController;
use App\Http\Controllers\Api\MaisonCertifTypeDeSurfacesController;
use App\Http\Controllers\Api\TypeDeSurfaceMaisonCertifsController;
use App\Http\Controllers\Api\MaisonCertifCritereImmeublesController;
use App\Http\Controllers\Api\CritereImmeubleMaisonCertifsController;
use App\Http\Controllers\Api\MaisonCertifExigenceImmeublesController;
use App\Http\Controllers\Api\ExigenceImmeubleMaisonCertifsController;
use App\Http\Controllers\Api\AcheteNowExigenceParticulieresController;
use App\Http\Controllers\Api\ExigenceParticuliereAcheteNowsController;
use App\Http\Controllers\Api\CertificationTypeCertificationsController;
use App\Http\Controllers\Api\TypeCertificationCertificationsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::apiResource('contacts', ContactController::class);

        Route::apiResource('users', UserController::class);

        Route::apiResource('maison-certifs', MaisonCertifController::class);

        // MaisonCertif Type De Surfaces
        Route::get('/maison-certifs/{maisonCertif}/type-de-surfaces', [
            MaisonCertifTypeDeSurfacesController::class,
            'index',
        ])->name('maison-certifs.type-de-surfaces.index');
        Route::post(
            '/maison-certifs/{maisonCertif}/type-de-surfaces/{typeDeSurface}',
            [MaisonCertifTypeDeSurfacesController::class, 'store']
        )->name('maison-certifs.type-de-surfaces.store');
        Route::delete(
            '/maison-certifs/{maisonCertif}/type-de-surfaces/{typeDeSurface}',
            [MaisonCertifTypeDeSurfacesController::class, 'destroy']
        )->name('maison-certifs.type-de-surfaces.destroy');

        // MaisonCertif Critere Immeubles
        Route::get('/maison-certifs/{maisonCertif}/critere-immeubles', [
            MaisonCertifCritereImmeublesController::class,
            'index',
        ])->name('maison-certifs.critere-immeubles.index');
        Route::post(
            '/maison-certifs/{maisonCertif}/critere-immeubles/{critereImmeuble}',
            [MaisonCertifCritereImmeublesController::class, 'store']
        )->name('maison-certifs.critere-immeubles.store');
        Route::delete(
            '/maison-certifs/{maisonCertif}/critere-immeubles/{critereImmeuble}',
            [MaisonCertifCritereImmeublesController::class, 'destroy']
        )->name('maison-certifs.critere-immeubles.destroy');

        // MaisonCertif Exigence Immeubles
        Route::get('/maison-certifs/{maisonCertif}/exigence-immeubles', [
            MaisonCertifExigenceImmeublesController::class,
            'index',
        ])->name('maison-certifs.exigence-immeubles.index');
        Route::post(
            '/maison-certifs/{maisonCertif}/exigence-immeubles/{exigenceImmeuble}',
            [MaisonCertifExigenceImmeublesController::class, 'store']
        )->name('maison-certifs.exigence-immeubles.store');
        Route::delete(
            '/maison-certifs/{maisonCertif}/exigence-immeubles/{exigenceImmeuble}',
            [MaisonCertifExigenceImmeublesController::class, 'destroy']
        )->name('maison-certifs.exigence-immeubles.destroy');

        Route::apiResource('type-de-surfaces', TypeDeSurfaceController::class);

        // TypeDeSurface Maison Certifs
        Route::get('/type-de-surfaces/{typeDeSurface}/maison-certifs', [
            TypeDeSurfaceMaisonCertifsController::class,
            'index',
        ])->name('type-de-surfaces.maison-certifs.index');
        Route::post(
            '/type-de-surfaces/{typeDeSurface}/maison-certifs/{maisonCertif}',
            [TypeDeSurfaceMaisonCertifsController::class, 'store']
        )->name('type-de-surfaces.maison-certifs.store');
        Route::delete(
            '/type-de-surfaces/{typeDeSurface}/maison-certifs/{maisonCertif}',
            [TypeDeSurfaceMaisonCertifsController::class, 'destroy']
        )->name('type-de-surfaces.maison-certifs.destroy');

        Route::apiResource(
            'critere-immeubles',
            CritereImmeubleController::class
        );

        // CritereImmeuble Maison Certifs
        Route::get('/critere-immeubles/{critereImmeuble}/maison-certifs', [
            CritereImmeubleMaisonCertifsController::class,
            'index',
        ])->name('critere-immeubles.maison-certifs.index');
        Route::post(
            '/critere-immeubles/{critereImmeuble}/maison-certifs/{maisonCertif}',
            [CritereImmeubleMaisonCertifsController::class, 'store']
        )->name('critere-immeubles.maison-certifs.store');
        Route::delete(
            '/critere-immeubles/{critereImmeuble}/maison-certifs/{maisonCertif}',
            [CritereImmeubleMaisonCertifsController::class, 'destroy']
        )->name('critere-immeubles.maison-certifs.destroy');

        Route::apiResource('achete-nows', AcheteNowController::class);

        // AcheteNow Etat Achats
        Route::get('/achete-nows/{acheteNow}/etat-achats', [
            AcheteNowEtatAchatsController::class,
            'index',
        ])->name('achete-nows.etat-achats.index');
        Route::post('/achete-nows/{acheteNow}/etat-achats/{etatAchat}', [
            AcheteNowEtatAchatsController::class,
            'store',
        ])->name('achete-nows.etat-achats.store');
        Route::delete('/achete-nows/{acheteNow}/etat-achats/{etatAchat}', [
            AcheteNowEtatAchatsController::class,
            'destroy',
        ])->name('achete-nows.etat-achats.destroy');

        // AcheteNow Exigence Particulieres
        Route::get('/achete-nows/{acheteNow}/exigence-particulieres', [
            AcheteNowExigenceParticulieresController::class,
            'index',
        ])->name('achete-nows.exigence-particulieres.index');
        Route::post(
            '/achete-nows/{acheteNow}/exigence-particulieres/{exigenceParticuliere}',
            [AcheteNowExigenceParticulieresController::class, 'store']
        )->name('achete-nows.exigence-particulieres.store');
        Route::delete(
            '/achete-nows/{acheteNow}/exigence-particulieres/{exigenceParticuliere}',
            [AcheteNowExigenceParticulieresController::class, 'destroy']
        )->name('achete-nows.exigence-particulieres.destroy');

        // AcheteNow Surface Annexes
        Route::get('/achete-nows/{acheteNow}/surface-annexes', [
            AcheteNowSurfaceAnnexesController::class,
            'index',
        ])->name('achete-nows.surface-annexes.index');
        Route::post(
            '/achete-nows/{acheteNow}/surface-annexes/{surfaceAnnexe}',
            [AcheteNowSurfaceAnnexesController::class, 'store']
        )->name('achete-nows.surface-annexes.store');
        Route::delete(
            '/achete-nows/{acheteNow}/surface-annexes/{surfaceAnnexe}',
            [AcheteNowSurfaceAnnexesController::class, 'destroy']
        )->name('achete-nows.surface-annexes.destroy');

        Route::apiResource('terrain-certifs', TerrainCertifController::class);

        Route::apiResource('certifications', CertificationController::class);

        // Certification Type Certifications
        Route::get('/certifications/{certification}/type-certifications', [
            CertificationTypeCertificationsController::class,
            'index',
        ])->name('certifications.type-certifications.index');
        Route::post(
            '/certifications/{certification}/type-certifications/{typeCertification}',
            [CertificationTypeCertificationsController::class, 'store']
        )->name('certifications.type-certifications.store');
        Route::delete(
            '/certifications/{certification}/type-certifications/{typeCertification}',
            [CertificationTypeCertificationsController::class, 'destroy']
        )->name('certifications.type-certifications.destroy');

        Route::apiResource('all-rendez-vous', RendezVousController::class);

        Route::apiResource('etat-achats', EtatAchatController::class);

        // EtatAchat Achete Nows
        Route::get('/etat-achats/{etatAchat}/achete-nows', [
            EtatAchatAcheteNowsController::class,
            'index',
        ])->name('etat-achats.achete-nows.index');
        Route::post('/etat-achats/{etatAchat}/achete-nows/{acheteNow}', [
            EtatAchatAcheteNowsController::class,
            'store',
        ])->name('etat-achats.achete-nows.store');
        Route::delete('/etat-achats/{etatAchat}/achete-nows/{acheteNow}', [
            EtatAchatAcheteNowsController::class,
            'destroy',
        ])->name('etat-achats.achete-nows.destroy');

        Route::apiResource(
            'exigence-particulieres',
            ExigenceParticuliereController::class
        );

        // ExigenceParticuliere Achete Nows
        Route::get(
            '/exigence-particulieres/{exigenceParticuliere}/achete-nows',
            [ExigenceParticuliereAcheteNowsController::class, 'index']
        )->name('exigence-particulieres.achete-nows.index');
        Route::post(
            '/exigence-particulieres/{exigenceParticuliere}/achete-nows/{acheteNow}',
            [ExigenceParticuliereAcheteNowsController::class, 'store']
        )->name('exigence-particulieres.achete-nows.store');
        Route::delete(
            '/exigence-particulieres/{exigenceParticuliere}/achete-nows/{acheteNow}',
            [ExigenceParticuliereAcheteNowsController::class, 'destroy']
        )->name('exigence-particulieres.achete-nows.destroy');

        Route::apiResource('surface-annexes', SurfaceAnnexeController::class);

        // SurfaceAnnexe Achete Nows
        Route::get('/surface-annexes/{surfaceAnnexe}/achete-nows', [
            SurfaceAnnexeAcheteNowsController::class,
            'index',
        ])->name('surface-annexes.achete-nows.index');
        Route::post(
            '/surface-annexes/{surfaceAnnexe}/achete-nows/{acheteNow}',
            [SurfaceAnnexeAcheteNowsController::class, 'store']
        )->name('surface-annexes.achete-nows.store');
        Route::delete(
            '/surface-annexes/{surfaceAnnexe}/achete-nows/{acheteNow}',
            [SurfaceAnnexeAcheteNowsController::class, 'destroy']
        )->name('surface-annexes.achete-nows.destroy');

        Route::apiResource(
            'type-certifications',
            TypeCertificationController::class
        );

        // TypeCertification Certifications
        Route::get('/type-certifications/{typeCertification}/certifications', [
            TypeCertificationCertificationsController::class,
            'index',
        ])->name('type-certifications.certifications.index');
        Route::post(
            '/type-certifications/{typeCertification}/certifications/{certification}',
            [TypeCertificationCertificationsController::class, 'store']
        )->name('type-certifications.certifications.store');
        Route::delete(
            '/type-certifications/{typeCertification}/certifications/{certification}',
            [TypeCertificationCertificationsController::class, 'destroy']
        )->name('type-certifications.certifications.destroy');

        Route::apiResource(
            'exigence-immeubles',
            ExigenceImmeubleController::class
        );

        // ExigenceImmeuble Maison Certifs
        Route::get('/exigence-immeubles/{exigenceImmeuble}/maison-certifs', [
            ExigenceImmeubleMaisonCertifsController::class,
            'index',
        ])->name('exigence-immeubles.maison-certifs.index');
        Route::post(
            '/exigence-immeubles/{exigenceImmeuble}/maison-certifs/{maisonCertif}',
            [ExigenceImmeubleMaisonCertifsController::class, 'store']
        )->name('exigence-immeubles.maison-certifs.store');
        Route::delete(
            '/exigence-immeubles/{exigenceImmeuble}/maison-certifs/{maisonCertif}',
            [ExigenceImmeubleMaisonCertifsController::class, 'destroy']
        )->name('exigence-immeubles.maison-certifs.destroy');
    });
