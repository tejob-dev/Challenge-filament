<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\MaisonCertif;
use App\Models\ExigenceImmeuble;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExigenceImmeubleMaisonCertifsTest extends TestCase
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
    public function it_gets_exigence_immeuble_maison_certifs()
    {
        $exigenceImmeuble = ExigenceImmeuble::factory()->create();
        $maisonCertif = MaisonCertif::factory()->create();

        $exigenceImmeuble->maisonCertifs()->attach($maisonCertif);

        $response = $this->getJson(
            route(
                'api.exigence-immeubles.maison-certifs.index',
                $exigenceImmeuble
            )
        );

        $response->assertOk()->assertSee($maisonCertif->nom_prenom);
    }

    /**
     * @test
     */
    public function it_can_attach_maison_certifs_to_exigence_immeuble()
    {
        $exigenceImmeuble = ExigenceImmeuble::factory()->create();
        $maisonCertif = MaisonCertif::factory()->create();

        $response = $this->postJson(
            route('api.exigence-immeubles.maison-certifs.store', [
                $exigenceImmeuble,
                $maisonCertif,
            ])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $exigenceImmeuble
                ->maisonCertifs()
                ->where('maison_certifs.id', $maisonCertif->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_maison_certifs_from_exigence_immeuble()
    {
        $exigenceImmeuble = ExigenceImmeuble::factory()->create();
        $maisonCertif = MaisonCertif::factory()->create();

        $response = $this->deleteJson(
            route('api.exigence-immeubles.maison-certifs.store', [
                $exigenceImmeuble,
                $maisonCertif,
            ])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $exigenceImmeuble
                ->maisonCertifs()
                ->where('maison_certifs.id', $maisonCertif->id)
                ->exists()
        );
    }
}
