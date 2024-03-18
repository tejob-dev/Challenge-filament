<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ExigenceParticuliere;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExigenceParticuliereTest extends TestCase
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
    public function it_gets_exigence_particulieres_list()
    {
        $exigenceParticulieres = ExigenceParticuliere::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.exigence-particulieres.index'));

        $response->assertOk()->assertSee($exigenceParticulieres[0]->libel);
    }

    /**
     * @test
     */
    public function it_stores_the_exigence_particuliere()
    {
        $data = ExigenceParticuliere::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.exigence-particulieres.store'),
            $data
        );

        $this->assertDatabaseHas('exigence_particulieres', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_exigence_particuliere()
    {
        $exigenceParticuliere = ExigenceParticuliere::factory()->create();

        $data = [
            'libel' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.exigence-particulieres.update', $exigenceParticuliere),
            $data
        );

        $data['id'] = $exigenceParticuliere->id;

        $this->assertDatabaseHas('exigence_particulieres', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_exigence_particuliere()
    {
        $exigenceParticuliere = ExigenceParticuliere::factory()->create();

        $response = $this->deleteJson(
            route('api.exigence-particulieres.destroy', $exigenceParticuliere)
        );

        $this->assertDeleted($exigenceParticuliere);

        $response->assertNoContent();
    }
}
