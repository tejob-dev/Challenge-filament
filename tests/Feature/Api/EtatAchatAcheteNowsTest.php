<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\EtatAchat;
use App\Models\AcheteNow;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EtatAchatAcheteNowsTest extends TestCase
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
    public function it_gets_etat_achat_achete_nows()
    {
        $etatAchat = EtatAchat::factory()->create();
        $acheteNow = AcheteNow::factory()->create();

        $etatAchat->acheteNows()->attach($acheteNow);

        $response = $this->getJson(
            route('api.etat-achats.achete-nows.index', $etatAchat)
        );

        $response->assertOk()->assertSee($acheteNow->nom_prenom);
    }

    /**
     * @test
     */
    public function it_can_attach_achete_nows_to_etat_achat()
    {
        $etatAchat = EtatAchat::factory()->create();
        $acheteNow = AcheteNow::factory()->create();

        $response = $this->postJson(
            route('api.etat-achats.achete-nows.store', [$etatAchat, $acheteNow])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $etatAchat
                ->acheteNows()
                ->where('achete_nows.id', $acheteNow->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_achete_nows_from_etat_achat()
    {
        $etatAchat = EtatAchat::factory()->create();
        $acheteNow = AcheteNow::factory()->create();

        $response = $this->deleteJson(
            route('api.etat-achats.achete-nows.store', [$etatAchat, $acheteNow])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $etatAchat
                ->acheteNows()
                ->where('achete_nows.id', $acheteNow->id)
                ->exists()
        );
    }
}
