<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\AcheteNow;
use App\Models\ExigenceParticuliere;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AcheteNowExigenceParticulieresTest extends TestCase
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
    public function it_gets_achete_now_exigence_particulieres()
    {
        $acheteNow = AcheteNow::factory()->create();
        $exigenceParticuliere = ExigenceParticuliere::factory()->create();

        $acheteNow->exigenceParticulieres()->attach($exigenceParticuliere);

        $response = $this->getJson(
            route('api.achete-nows.exigence-particulieres.index', $acheteNow)
        );

        $response->assertOk()->assertSee($exigenceParticuliere->libel);
    }

    /**
     * @test
     */
    public function it_can_attach_exigence_particulieres_to_achete_now()
    {
        $acheteNow = AcheteNow::factory()->create();
        $exigenceParticuliere = ExigenceParticuliere::factory()->create();

        $response = $this->postJson(
            route('api.achete-nows.exigence-particulieres.store', [
                $acheteNow,
                $exigenceParticuliere,
            ])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $acheteNow
                ->exigenceParticulieres()
                ->where('exigence_particulieres.id', $exigenceParticuliere->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_exigence_particulieres_from_achete_now()
    {
        $acheteNow = AcheteNow::factory()->create();
        $exigenceParticuliere = ExigenceParticuliere::factory()->create();

        $response = $this->deleteJson(
            route('api.achete-nows.exigence-particulieres.store', [
                $acheteNow,
                $exigenceParticuliere,
            ])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $acheteNow
                ->exigenceParticulieres()
                ->where('exigence_particulieres.id', $exigenceParticuliere->id)
                ->exists()
        );
    }
}
