<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\TerrainCertif;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TerrainCertifControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_terrain_certifs()
    {
        $terrainCertifs = TerrainCertif::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('terrain-certifs.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.terrain_certifs.index')
            ->assertViewHas('terrainCertifs');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_terrain_certif()
    {
        $response = $this->get(route('terrain-certifs.create'));

        $response->assertOk()->assertViewIs('app.terrain_certifs.create');
    }

    /**
     * @test
     */
    public function it_stores_the_terrain_certif()
    {
        $data = TerrainCertif::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('terrain-certifs.store'), $data);

        $this->assertDatabaseHas('terrain_certifs', $data);

        $terrainCertif = TerrainCertif::latest('id')->first();

        $response->assertRedirect(
            route('terrain-certifs.edit', $terrainCertif)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_terrain_certif()
    {
        $terrainCertif = TerrainCertif::factory()->create();

        $response = $this->get(route('terrain-certifs.show', $terrainCertif));

        $response
            ->assertOk()
            ->assertViewIs('app.terrain_certifs.show')
            ->assertViewHas('terrainCertif');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_terrain_certif()
    {
        $terrainCertif = TerrainCertif::factory()->create();

        $response = $this->get(route('terrain-certifs.edit', $terrainCertif));

        $response
            ->assertOk()
            ->assertViewIs('app.terrain_certifs.edit')
            ->assertViewHas('terrainCertif');
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

        $response = $this->put(
            route('terrain-certifs.update', $terrainCertif),
            $data
        );

        $data['id'] = $terrainCertif->id;

        $this->assertDatabaseHas('terrain_certifs', $data);

        $response->assertRedirect(
            route('terrain-certifs.edit', $terrainCertif)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_terrain_certif()
    {
        $terrainCertif = TerrainCertif::factory()->create();

        $response = $this->delete(
            route('terrain-certifs.destroy', $terrainCertif)
        );

        $response->assertRedirect(route('terrain-certifs.index'));

        $this->assertDeleted($terrainCertif);
    }
}
