<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\TypeDeSurface;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TypeDeSurfaceTest extends TestCase
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
    public function it_gets_type_de_surfaces_list()
    {
        $typeDeSurfaces = TypeDeSurface::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.type-de-surfaces.index'));

        $response->assertOk()->assertSee($typeDeSurfaces[0]->libel);
    }

    /**
     * @test
     */
    public function it_stores_the_type_de_surface()
    {
        $data = TypeDeSurface::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.type-de-surfaces.store'), $data);

        $this->assertDatabaseHas('type_de_surfaces', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_type_de_surface()
    {
        $typeDeSurface = TypeDeSurface::factory()->create();

        $data = [
            'libel' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.type-de-surfaces.update', $typeDeSurface),
            $data
        );

        $data['id'] = $typeDeSurface->id;

        $this->assertDatabaseHas('type_de_surfaces', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_type_de_surface()
    {
        $typeDeSurface = TypeDeSurface::factory()->create();

        $response = $this->deleteJson(
            route('api.type-de-surfaces.destroy', $typeDeSurface)
        );

        $this->assertDeleted($typeDeSurface);

        $response->assertNoContent();
    }
}
