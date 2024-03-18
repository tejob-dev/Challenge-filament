<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\MaisonCertif;
use App\Models\TypeDeSurface;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TypeDeSurfaceMaisonCertifsTest extends TestCase
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
    public function it_gets_type_de_surface_maison_certifs()
    {
        $typeDeSurface = TypeDeSurface::factory()->create();
        $maisonCertif = MaisonCertif::factory()->create();

        $typeDeSurface->maisonCertifs()->attach($maisonCertif);

        $response = $this->getJson(
            route('api.type-de-surfaces.maison-certifs.index', $typeDeSurface)
        );

        $response->assertOk()->assertSee($maisonCertif->nom_prenom);
    }

    /**
     * @test
     */
    public function it_can_attach_maison_certifs_to_type_de_surface()
    {
        $typeDeSurface = TypeDeSurface::factory()->create();
        $maisonCertif = MaisonCertif::factory()->create();

        $response = $this->postJson(
            route('api.type-de-surfaces.maison-certifs.store', [
                $typeDeSurface,
                $maisonCertif,
            ])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $typeDeSurface
                ->maisonCertifs()
                ->where('maison_certifs.id', $maisonCertif->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_maison_certifs_from_type_de_surface()
    {
        $typeDeSurface = TypeDeSurface::factory()->create();
        $maisonCertif = MaisonCertif::factory()->create();

        $response = $this->deleteJson(
            route('api.type-de-surfaces.maison-certifs.store', [
                $typeDeSurface,
                $maisonCertif,
            ])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $typeDeSurface
                ->maisonCertifs()
                ->where('maison_certifs.id', $maisonCertif->id)
                ->exists()
        );
    }
}
