<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\AcheteNow;
use App\Models\SurfaceAnnexe;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AcheteNowSurfaceAnnexesTest extends TestCase
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
    public function it_gets_achete_now_surface_annexes()
    {
        $acheteNow = AcheteNow::factory()->create();
        $surfaceAnnexe = SurfaceAnnexe::factory()->create();

        $acheteNow->surfaceAnnexes()->attach($surfaceAnnexe);

        $response = $this->getJson(
            route('api.achete-nows.surface-annexes.index', $acheteNow)
        );

        $response->assertOk()->assertSee($surfaceAnnexe->libel);
    }

    /**
     * @test
     */
    public function it_can_attach_surface_annexes_to_achete_now()
    {
        $acheteNow = AcheteNow::factory()->create();
        $surfaceAnnexe = SurfaceAnnexe::factory()->create();

        $response = $this->postJson(
            route('api.achete-nows.surface-annexes.store', [
                $acheteNow,
                $surfaceAnnexe,
            ])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $acheteNow
                ->surfaceAnnexes()
                ->where('surface_annexes.id', $surfaceAnnexe->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_surface_annexes_from_achete_now()
    {
        $acheteNow = AcheteNow::factory()->create();
        $surfaceAnnexe = SurfaceAnnexe::factory()->create();

        $response = $this->deleteJson(
            route('api.achete-nows.surface-annexes.store', [
                $acheteNow,
                $surfaceAnnexe,
            ])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $acheteNow
                ->surfaceAnnexes()
                ->where('surface_annexes.id', $surfaceAnnexe->id)
                ->exists()
        );
    }
}
