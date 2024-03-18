<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\TypeDeSurface;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TypeDeSurfaceControllerTest extends TestCase
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
    public function it_displays_index_view_with_type_de_surfaces()
    {
        $typeDeSurfaces = TypeDeSurface::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('type-de-surfaces.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.type_de_surfaces.index')
            ->assertViewHas('typeDeSurfaces');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_type_de_surface()
    {
        $response = $this->get(route('type-de-surfaces.create'));

        $response->assertOk()->assertViewIs('app.type_de_surfaces.create');
    }

    /**
     * @test
     */
    public function it_stores_the_type_de_surface()
    {
        $data = TypeDeSurface::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('type-de-surfaces.store'), $data);

        $this->assertDatabaseHas('type_de_surfaces', $data);

        $typeDeSurface = TypeDeSurface::latest('id')->first();

        $response->assertRedirect(
            route('type-de-surfaces.edit', $typeDeSurface)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_type_de_surface()
    {
        $typeDeSurface = TypeDeSurface::factory()->create();

        $response = $this->get(route('type-de-surfaces.show', $typeDeSurface));

        $response
            ->assertOk()
            ->assertViewIs('app.type_de_surfaces.show')
            ->assertViewHas('typeDeSurface');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_type_de_surface()
    {
        $typeDeSurface = TypeDeSurface::factory()->create();

        $response = $this->get(route('type-de-surfaces.edit', $typeDeSurface));

        $response
            ->assertOk()
            ->assertViewIs('app.type_de_surfaces.edit')
            ->assertViewHas('typeDeSurface');
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

        $response = $this->put(
            route('type-de-surfaces.update', $typeDeSurface),
            $data
        );

        $data['id'] = $typeDeSurface->id;

        $this->assertDatabaseHas('type_de_surfaces', $data);

        $response->assertRedirect(
            route('type-de-surfaces.edit', $typeDeSurface)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_type_de_surface()
    {
        $typeDeSurface = TypeDeSurface::factory()->create();

        $response = $this->delete(
            route('type-de-surfaces.destroy', $typeDeSurface)
        );

        $response->assertRedirect(route('type-de-surfaces.index'));

        $this->assertDeleted($typeDeSurface);
    }
}
