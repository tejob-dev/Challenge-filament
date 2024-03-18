<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\RendezVous;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RendezVousTest extends TestCase
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
    public function it_gets_all_rendez_vous_list()
    {
        $allRendezVous = RendezVous::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.all-rendez-vous.index'));

        $response->assertOk()->assertSee($allRendezVous[0]->nompre);
    }

    /**
     * @test
     */
    public function it_stores_the_rendez_vous()
    {
        $data = RendezVous::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.all-rendez-vous.store'), $data);

        $this->assertDatabaseHas('rendez_vous', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_rendez_vous()
    {
        $rendezVous = RendezVous::factory()->create();

        $data = [
            'nompre' => $this->faker->text(255),
            'telephone' => $this->faker->text(255),
            'votr_email' => $this->faker->text(255),
            'rdv-date' => $this->faker->text(255),
            'rdv-hour' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.all-rendez-vous.update', $rendezVous),
            $data
        );

        $data['id'] = $rendezVous->id;

        $this->assertDatabaseHas('rendez_vous', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_rendez_vous()
    {
        $rendezVous = RendezVous::factory()->create();

        $response = $this->deleteJson(
            route('api.all-rendez-vous.destroy', $rendezVous)
        );

        $this->assertDeleted($rendezVous);

        $response->assertNoContent();
    }
}
