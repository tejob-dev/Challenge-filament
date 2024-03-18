<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AcheteNowController;
use App\Http\Controllers\EtatAchatController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\MaisonCertifController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\SurfaceAnnexeController;
use App\Http\Controllers\TerrainCertifController;
use App\Http\Controllers\TypeDeSurfaceController;
use App\Http\Controllers\CritereImmeubleController;
use App\Http\Controllers\ExigenceImmeubleController;
use App\Http\Controllers\TypeCertificationController;
use App\Http\Controllers\ExigenceParticuliereController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('/home', function(){
    return redirect("/admin");
})->name('home');
Route::get('/connexion', function(){
    return redirect("/admin");
});

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('contacts', ContactController::class);
        Route::resource('users', UserController::class);
        Route::resource('maison-certifs', MaisonCertifController::class);
        Route::resource('critere-immeubles', CritereImmeubleController::class);
        Route::resource('achete-nows', AcheteNowController::class);
        Route::resource('terrain-certifs', TerrainCertifController::class);
        Route::resource('certifications', CertificationController::class);
        Route::post('all-rendez-vous', [
            RendezVousController::class,
            'store',
            ])->name('all-rendez-vous.store');
        Route::get('all-rendez-vous', [
            RendezVousController::class,
            'index',
        ])->name('all-rendez-vous.index');
        Route::get('all-rendez-vous/create', [
            RendezVousController::class,
            'create',
            ])->name('all-rendez-vous.create');
        Route::get('all-rendez-vous/{rendezVous}', [
            RendezVousController::class,
            'show',
        ])->name('all-rendez-vous.show');
        Route::get('all-rendez-vous/{rendezVous}/edit', [
            RendezVousController::class,
            'edit',
        ])->name('all-rendez-vous.edit');
        Route::put('all-rendez-vous/{rendezVous}', [
            RendezVousController::class,
            'update',
        ])->name('all-rendez-vous.update');
        Route::delete('all-rendez-vous/{rendezVous}', [
            RendezVousController::class,
            'destroy',
        ])->name('all-rendez-vous.destroy');
        
    });
    
        Route::resource('type-de-surfaces', TypeDeSurfaceController::class);
    Route::resource('etat-achats', EtatAchatController::class);
    Route::resource(
        'exigence-particulieres',
        ExigenceParticuliereController::class
    );
    Route::resource('surface-annexes', SurfaceAnnexeController::class);
    Route::resource(
        'type-certifications',
        TypeCertificationController::class
    );
    Route::resource(
        'exigence-immeubles',
        ExigenceImmeubleController::class
    );