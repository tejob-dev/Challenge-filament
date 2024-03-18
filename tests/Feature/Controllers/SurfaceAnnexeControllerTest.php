<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\SurfaceAnnexe;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SurfaceAnnexeControllerTest extends TestCase
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
    public function it_displays_index_view_with_surface_annexes()
    {
        $surfaceAnnexes = SurfaceAnnexe::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('surface-annexes.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.surface_annexes.index')
            ->assertViewHas('surfaceAnnexes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_surface_annexe()
    {
        $response = $this->get(route('surface-annexes.create'));

        $response->assertOk()->assertViewIs('app.surface_annexes.create');
    }

    /**
     * @test
     */
    public function it_stores_the_surface_annexe()
    {
        $data = SurfaceAnnexe::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('surface-annexes.store'), $data);

        $this->assertDatabaseHas('surface_annexes', $data);

        $surfaceAnnexe = SurfaceAnnexe::latest('id')->first();

        $response->assertRedirect(
            route('surface-annexes.edit', $surfaceAnnexe)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_surface_annexe()
    {
        $surfaceAnnexe = SurfaceAnnexe::factory()->create();

        $response = $this->get(route('surface-annexes.show', $surfaceAnnexe));

        $response
            ->assertOk()
            ->assertViewIs('app.surface_annexes.show')
            ->assertViewHas('surfaceAnnexe');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_surface_annexe()
    {
        $surfaceAnnexe = SurfaceAnnexe::factory()->create();

        $response = $this->get(route('surface-annexes.edit', $surfaceAnnexe));

        $response
            ->assertOk()
            ->assertViewIs('app.surface_annexes.edit')
            ->assertViewHas('surfaceAnnexe');
    }

    /**
     * @test
     */
    public function it_updates_the_surface_annexe()
    {
        $surfaceAnnexe = SurfaceAnnexe::factory()->create();

        $data = [
            'libel' => $this->faker->text(255),
        ];

        $response = $this->put(
            route('surface-annexes.update', $surfaceAnnexe),
            $data
        );

        $data['id'] = $surfaceAnnexe->id;

        $this->assertDatabaseHas('surface_annexes', $data);

        $response->assertRedirect(
            route('surface-annexes.edit', $surfaceAnnexe)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_surface_annexe()
    {
        $surfaceAnnexe = SurfaceAnnexe::factory()->create();

        $response = $this->delete(
            route('surface-annexes.destroy', $surfaceAnnexe)
        );

        $response->assertRedirect(route('surface-annexes.index'));

        $this->assertDeleted($surfaceAnnexe);
    }
}
