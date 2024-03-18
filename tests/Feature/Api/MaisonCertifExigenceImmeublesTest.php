<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\MaisonCertif;
use App\Models\ExigenceImmeuble;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MaisonCertifExigenceImmeublesTest extends TestCase
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
    public function it_gets_maison_certif_exigence_immeubles()
    {
        $maisonCertif = MaisonCertif::factory()->create();
        $exigenceImmeuble = ExigenceImmeuble::factory()->create();

        $maisonCertif->exigenceImmeubles()->attach($exigenceImmeuble);

        $response = $this->getJson(
            route('api.maison-certifs.exigence-immeubles.index', $maisonCertif)
        );

        $response->assertOk()->assertSee($exigenceImmeuble->libel);
    }

    /**
     * @test
     */
    public function it_can_attach_exigence_immeubles_to_maison_certif()
    {
        $maisonCertif = MaisonCertif::factory()->create();
        $exigenceImmeuble = ExigenceImmeuble::factory()->create();

        $response = $this->postJson(
            route('api.maison-certifs.exigence-immeubles.store', [
                $maisonCertif,
                $exigenceImmeuble,
            ])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $maisonCertif
                ->exigenceImmeubles()
                ->where('exigence_immeubles.id', $exigenceImmeuble->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_exigence_immeubles_from_maison_certif()
    {
        $maisonCertif = MaisonCertif::factory()->create();
        $exigenceImmeuble = ExigenceImmeuble::factory()->create();

        $response = $this->deleteJson(
            route('api.maison-certifs.exigence-immeubles.store', [
                $maisonCertif,
                $exigenceImmeuble,
            ])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $maisonCertif
                ->exigenceImmeubles()
                ->where('exigence_immeubles.id', $exigenceImmeuble->id)
                ->exists()
        );
    }
}
