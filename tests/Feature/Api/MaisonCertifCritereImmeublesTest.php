<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\MaisonCertif;
use App\Models\CritereImmeuble;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MaisonCertifCritereImmeublesTest extends TestCase
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
    public function it_gets_maison_certif_critere_immeubles()
    {
        $maisonCertif = MaisonCertif::factory()->create();
        $critereImmeuble = CritereImmeuble::factory()->create();

        $maisonCertif->critereImmeubles()->attach($critereImmeuble);

        $response = $this->getJson(
            route('api.maison-certifs.critere-immeubles.index', $maisonCertif)
        );

        $response->assertOk()->assertSee($critereImmeuble->libel);
    }

    /**
     * @test
     */
    public function it_can_attach_critere_immeubles_to_maison_certif()
    {
        $maisonCertif = MaisonCertif::factory()->create();
        $critereImmeuble = CritereImmeuble::factory()->create();

        $response = $this->postJson(
            route('api.maison-certifs.critere-immeubles.store', [
                $maisonCertif,
                $critereImmeuble,
            ])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $maisonCertif
                ->critereImmeubles()
                ->where('critere_immeubles.id', $critereImmeuble->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_critere_immeubles_from_maison_certif()
    {
        $maisonCertif = MaisonCertif::factory()->create();
        $critereImmeuble = CritereImmeuble::factory()->create();

        $response = $this->deleteJson(
            route('api.maison-certifs.critere-immeubles.store', [
                $maisonCertif,
                $critereImmeuble,
            ])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $maisonCertif
                ->critereImmeubles()
                ->where('critere_immeubles.id', $critereImmeuble->id)
                ->exists()
        );
    }
}
