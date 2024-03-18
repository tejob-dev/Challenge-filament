<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\AcheteNow;
use App\Models\EtatAchat;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AcheteNowEtatAchatsTest extends TestCase
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
    public function it_gets_achete_now_etat_achats()
    {
        $acheteNow = AcheteNow::factory()->create();
        $etatAchat = EtatAchat::factory()->create();

        $acheteNow->etatAchats()->attach($etatAchat);

        $response = $this->getJson(
            route('api.achete-nows.etat-achats.index', $acheteNow)
        );

        $response->assertOk()->assertSee($etatAchat->libel);
    }

    /**
     * @test
     */
    public function it_can_attach_etat_achats_to_achete_now()
    {
        $acheteNow = AcheteNow::factory()->create();
        $etatAchat = EtatAchat::factory()->create();

        $response = $this->postJson(
            route('api.achete-nows.etat-achats.store', [$acheteNow, $etatAchat])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $acheteNow
                ->etatAchats()
                ->where('etat_achats.id', $etatAchat->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_etat_achats_from_achete_now()
    {
        $acheteNow = AcheteNow::factory()->create();
        $etatAchat = EtatAchat::factory()->create();

        $response = $this->deleteJson(
            route('api.achete-nows.etat-achats.store', [$acheteNow, $etatAchat])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $acheteNow
                ->etatAchats()
                ->where('etat_achats.id', $etatAchat->id)
                ->exists()
        );
    }
}
