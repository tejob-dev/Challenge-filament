<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\MaisonCertif;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MaisonCertifTest extends TestCase
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
    public function it_gets_maison_certifs_list()
    {
        $maisonCertifs = MaisonCertif::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.maison-certifs.index'));

        $response->assertOk()->assertSee($maisonCertifs[0]->nom_prenom);
    }

    /**
     * @test
     */
    public function it_stores_the_maison_certif()
    {
        $data = MaisonCertif::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.maison-certifs.store'), $data);

        $this->assertDatabaseHas('maison_certifs', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.maison-certifs.update', $maisonCertif),
            $data
        );

        $data['id'] = $maisonCertif->id;

        $this->assertDatabaseHas('maison_certifs', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_maison_certif()
    {
        $maisonCertif = MaisonCertif::factory()->create();

        $response = $this->deleteJson(
            route('api.maison-certifs.destroy', $maisonCertif)
        );

        $this->assertDeleted($maisonCertif);

        $response->assertNoContent();
    }
}
