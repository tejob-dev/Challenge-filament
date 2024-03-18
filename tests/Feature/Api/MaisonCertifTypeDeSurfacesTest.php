<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\MaisonCertif;
use App\Models\TypeDeSurface;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MaisonCertifTypeDeSurfacesTest extends TestCase
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
    public function it_gets_maison_certif_type_de_surfaces()
    {
        $maisonCertif = MaisonCertif::factory()->create();
        $typeDeSurface = TypeDeSurface::factory()->create();

        $maisonCertif->typeDeSurfaces()->attach($typeDeSurface);

        $response = $this->getJson(
            route('api.maison-certifs.type-de-surfaces.index', $maisonCertif)
        );

        $response->assertOk()->assertSee($typeDeSurface->libel);
    }

    /**
     * @test
     */
    public function it_can_attach_type_de_surfaces_to_maison_certif()
    {
        $maisonCertif = MaisonCertif::factory()->create();
        $typeDeSurface = TypeDeSurface::factory()->create();

        $response = $this->postJson(
            route('api.maison-certifs.type-de-surfaces.store', [
                $maisonCertif,
                $typeDeSurface,
            ])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $maisonCertif
                ->typeDeSurfaces()
                ->where('type_de_surfaces.id', $typeDeSurface->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_type_de_surfaces_from_maison_certif()
    {
        $maisonCertif = MaisonCertif::factory()->create();
        $typeDeSurface = TypeDeSurface::factory()->create();

        $response = $this->deleteJson(
            route('api.maison-certifs.type-de-surfaces.store', [
                $maisonCertif,
                $typeDeSurface,
            ])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $maisonCertif
                ->typeDeSurfaces()
                ->where('type_de_surfaces.id', $typeDeSurface->id)
                ->exists()
        );
    }
}
