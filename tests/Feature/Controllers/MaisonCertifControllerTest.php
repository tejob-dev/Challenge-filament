<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\MaisonCertif;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MaisonCertifControllerTest extends TestCase
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
    public function it_displays_index_view_with_maison_certifs()
    {
        $maisonCertifs = MaisonCertif::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('maison-certifs.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.maison_certifs.index')
            ->assertViewHas('maisonCertifs');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_maison_certif()
    {
        $response = $this->get(route('maison-certifs.create'));

        $response->assertOk()->assertViewIs('app.maison_certifs.create');
    }

    /**
     * @test
     */
    public function it_stores_the_maison_certif()
    {
        $data = MaisonCertif::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('maison-certifs.store'), $data);

        $this->assertDatabaseHas('maison_certifs', $data);

        $maisonCertif = MaisonCertif::latest('id')->first();

        $response->assertRedirect(route('maison-certifs.edit', $maisonCertif));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_maison_certif()
    {
        $maisonCertif = MaisonCertif::factory()->create();

        $response = $this->get(route('maison-certifs.show', $maisonCertif));

        $response
            ->assertOk()
            ->assertViewIs('app.maison_certifs.show')
            ->assertViewHas('maisonCertif');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_maison_certif()
    {
        $maisonCertif = MaisonCertif::factory()->create();

        $response = $this->get(route('maison-certifs.edit', $maisonCertif));

        $response
            ->assertOk()
            ->assertViewIs('app.maison_certifs.edit')
            ->assertViewHas('maisonCertif');
    }

    /**
     * @test
     */
    public function it_updates_the_maison_certif()
    {
        $maisonCertif = MaisonCertif::factory()->create();

        $data = [
            'nom_prenom' => $this->faker->text(255),
            'telephone' => $this->faker->text(255),
            'email' => $this->faker->email,
            'typelogement' => $this->faker->text(255),
            'nbr_chambre' => $this->faker->text(255),
            'nbr_salle' => $this->faker->text(255),
            'moment_acquis' => $this->faker->text(255),
            'ma_preference' => $this->faker->text(255),
            'surface_habitable' => $this->faker->text(255),
            'commune' => $this->faker->text(255),
            'type_construction' => $this->faker->text(255),
            'budget' => $this->faker->text(255),
            'autre_budget' => $this->faker->text(255),
            'type_emploi' => $this->faker->text(255),
            'proprietaire' => $this->faker->text(255),
        ];

        $response = $this->put(
            route('maison-certifs.update', $maisonCertif),
            $data
        );

        $data['id'] = $maisonCertif->id;

        $this->assertDatabaseHas('maison_certifs', $data);

        $response->assertRedirect(route('maison-certifs.edit', $maisonCertif));
    }

    /**
     * @test
     */
    public function it_deletes_the_maison_certif()
    {
        $maisonCertif = MaisonCertif::factory()->create();

        $response = $this->delete(
            route('maison-certifs.destroy', $maisonCertif)
        );

        $response->assertRedirect(route('maison-certifs.index'));

        $this->assertDeleted($maisonCertif);
    }
}
