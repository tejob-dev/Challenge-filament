<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\CritereImmeuble;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CritereImmeubleTest extends TestCase
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
    public function it_gets_critere_immeubles_list()
    {
        $critereImmeubles = CritereImmeuble::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.critere-immeubles.index'));

        $response->assertOk()->assertSee($critereImmeubles[0]->libel);
    }

    /**
     * @test
     */
    public function it_stores_the_critere_immeuble()
    {
        $data = CritereImmeuble::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.critere-immeubles.store'),
            $data
        );

        $this->assertDatabaseHas('critere_immeubles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_critere_immeuble()
    {
        $critereImmeuble = CritereImmeuble::factory()->create();

        $data = [
            'libel' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.critere-immeubles.update', $critereImmeuble),
            $data
        );

        $data['id'] = $critereImmeuble->id;

        $this->assertDatabaseHas('critere_immeubles', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_critere_immeuble()
    {
        $critereImmeuble = CritereImmeuble::factory()->create();

        $response = $this->deleteJson(
            route('api.critere-immeubles.destroy', $critereImmeuble)
        );

        $this->assertDeleted($critereImmeuble);

        $response->assertNoContent();
    }
}
