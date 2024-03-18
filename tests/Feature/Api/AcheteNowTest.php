<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\AcheteNow;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AcheteNowTest extends TestCase
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
    public function it_gets_achete_nows_list()
    {
        $acheteNows = AcheteNow::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.achete-nows.index'));

        $response->assertOk()->assertSee($acheteNows[0]->nom_prenom);
    }

    /**
     * @test
     */
    public function it_stores_the_achete_now()
    {
        $data = AcheteNow::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.achete-nows.store'), $data);

        $this->assertDatabaseHas('achete_nows', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_achete_now()
    {
        $acheteNow = AcheteNow::factory()->create();

        $data = [
            'nom_prenom' => $this->faker->text(255),
            'telephone' => $this->faker->text(255),
            'email' => $this->faker->email,
            'ou_recherchez_vous' => $this->faker->text(255),
            'typelogement' => $this->faker->text(255),
            'surface-recherch' => $this->faker->text(255),
            'min_budget' => $this->faker->text(255),
            'max_budget' => $this->faker->text(255),
            'nbr_piece' => $this->faker->text(255),
            'nbr_chambre' => $this->faker->text(255),
            'surface' => $this->faker->text(255),
            'criter_appart' => $this->faker->text(255),
            'filtrag_annonce' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.achete-nows.update', $acheteNow),
            $data
        );

        $data['id'] = $acheteNow->id;

        $this->assertDatabaseHas('achete_nows', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_achete_now()
    {
        $acheteNow = AcheteNow::factory()->create();

        $response = $this->deleteJson(
            route('api.achete-nows.destroy', $acheteNow)
        );

        $this->assertDeleted($acheteNow);

        $response->assertNoContent();
    }
}
