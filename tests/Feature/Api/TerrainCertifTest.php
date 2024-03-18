<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\TerrainCertif;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TerrainCertifTest extends TestCase
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
    public function it_gets_terrain_certifs_list()
    {
        $terrainCertifs = TerrainCertif::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.terrain-certifs.index'));

        $response->assertOk()->assertSee($terrainCertifs[0]->nom_prenom);
    }

    /**
     * @test
     */
    public function it_stores_the_terrain_certif()
    {
        $data = TerrainCertif::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.terrain-certifs.store'), $data);

        $this->assertDatabaseHas('terrain_certifs', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_terrain_certif()
    {
        $terrainCertif = TerrainCertif::factory()->create();

        $data = [
            'nom_prenom' => $this->faker->text(255),
            'telephone' => $this->faker->text(255),
            'email' => $this->faker->email,
            'partic_group' => $this->faker->text(255),
            'obj_achat' => $this->faker->text(255),
            'commune' => $this->faker->text(255),
            'surface' => $this->faker->text(255),
            'config_terrain' => $this->faker->text(255),
            'prec_config_terrain' => $this->faker->text(255),
            'min_budget' => $this->faker->text(255),
            'max_budget' => $this->faker->text(255),
            'financement' => $this->faker->text(255),
            'info_spplement' => $this->faker->text(255),
            'votre_poste' => $this->faker->text(255),
            'moment_acquis' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.terrain-certifs.update', $terrainCertif),
            $data
        );

        $data['id'] = $terrainCertif->id;

        $this->assertDatabaseHas('terrain_certifs', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_terrain_certif()
    {
        $terrainCertif = TerrainCertif::factory()->create();

        $response = $this->deleteJson(
            route('api.terrain-certifs.destroy', $terrainCertif)
        );

        $this->assertDeleted($terrainCertif);

        $response->assertNoContent();
    }
}
