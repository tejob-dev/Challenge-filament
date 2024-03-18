<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\AcheteNow;
use App\Models\ExigenceParticuliere;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExigenceParticuliereAcheteNowsTest extends TestCase
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
    public function it_gets_exigence_particuliere_achete_nows()
    {
        $exigenceParticuliere = ExigenceParticuliere::factory()->create();
        $acheteNow = AcheteNow::factory()->create();

        $exigenceParticuliere->acheteNows()->attach($acheteNow);

        $response = $this->getJson(
            route(
                'api.exigence-particulieres.achete-nows.index',
                $exigenceParticuliere
            )
        );

        $response->assertOk()->assertSee($acheteNow->nom_prenom);
    }

    /**
     * @test
     */
    public function it_can_attach_achete_nows_to_exigence_particuliere()
    {
        $exigenceParticuliere = ExigenceParticuliere::factory()->create();
        $acheteNow = AcheteNow::factory()->create();

        $response = $this->postJson(
            route('api.exigence-particulieres.achete-nows.store', [
                $exigenceParticuliere,
                $acheteNow,
            ])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $exigenceParticuliere
                ->acheteNows()
                ->where('achete_nows.id', $acheteNow->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_achete_nows_from_exigence_particuliere()
    {
        $exigenceParticuliere = ExigenceParticuliere::factory()->create();
        $acheteNow = AcheteNow::factory()->create();

        $response = $this->deleteJson(
            route('api.exigence-particulieres.achete-nows.store', [
                $exigenceParticuliere,
                $acheteNow,
            ])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $exigenceParticuliere
                ->acheteNows()
                ->where('achete_nows.id', $acheteNow->id)
                ->exists()
        );
    }
}
