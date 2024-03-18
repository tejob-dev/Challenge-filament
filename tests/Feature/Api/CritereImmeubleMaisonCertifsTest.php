<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\MaisonCertif;
use App\Models\CritereImmeuble;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CritereImmeubleMaisonCertifsTest extends TestCase
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
    public function it_gets_critere_immeuble_maison_certifs()
    {
        $critereImmeuble = CritereImmeuble::factory()->create();
        $maisonCertif = MaisonCertif::factory()->create();

        $critereImmeuble->maisonCertifs()->attach($maisonCertif);

        $response = $this->getJson(
            route(
                'api.critere-immeubles.maison-certifs.index',
                $critereImmeuble
            )
        );

        $response->assertOk()->assertSee($maisonCertif->nom_prenom);
    }

    /**
     * @test
     */
    public function it_can_attach_maison_certifs_to_critere_immeuble()
    {
        $critereImmeuble = CritereImmeuble::factory()->create();
        $maisonCertif = MaisonCertif::factory()->create();

        $response = $this->postJson(
            route('api.critere-immeubles.maison-certifs.store', [
                $critereImmeuble,
                $maisonCertif,
            ])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $critereImmeuble
                ->maisonCertifs()
                ->where('maison_certifs.id', $maisonCertif->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_maison_certifs_from_critere_immeuble()
    {
        $critereImmeuble = CritereImmeuble::factory()->create();
        $maisonCertif = MaisonCertif::factory()->create();

        $response = $this->deleteJson(
            route('api.critere-immeubles.maison-certifs.store', [
                $critereImmeuble,
                $maisonCertif,
            ])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $critereImmeuble
                ->maisonCertifs()
                ->where('maison_certifs.id', $maisonCertif->id)
                ->exists()
        );
    }
}
