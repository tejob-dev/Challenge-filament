<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\AcheteNow;
use App\Models\SurfaceAnnexe;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SurfaceAnnexeAcheteNowsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_surface_annexe_achete_nows()
    {
        $surfaceAnnexe = SurfaceAnnexe::factory()->create();
        $acheteNow = AcheteNow::factory()->create();

        $surfaceAnnexe->acheteNows()->attach($acheteNow);

        $response = $this->getJson(
            route('api.surface-annexes.achete-nows.index', $surfaceAnnexe)
        );

        $response->assertOk()->assertSee($acheteNow->nom_prenom);
    }

    /**
     * @test
     */
    public function it_can_attach_achete_nows_to_surface_annexe()
    {
        $surfaceAnnexe = SurfaceAnnexe::factory()->create();
        $acheteNow = AcheteNow::factory()->create();

        $response = $this->postJson(
            route('api.surface-annexes.achete-nows.store', [
                $surfaceAnnexe,
                $acheteNow,
            ])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $surfaceAnnexe
                ->acheteNows()
                ->where('achete_nows.id', $acheteNow->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_achete_nows_from_surface_annexe()
    {
        $surfaceAnnexe = SurfaceAnnexe::factory()->create();
        $acheteNow = AcheteNow::factory()->create();

        $response = $this->deleteJson(
            route('api.surface-annexes.achete-nows.store', [
                $surfaceAnnexe,
                $acheteNow,
            ])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $surfaceAnnexe
                ->acheteNows()
                ->where('achete_nows.id', $acheteNow->id)
                ->exists()
        );
    }
}
