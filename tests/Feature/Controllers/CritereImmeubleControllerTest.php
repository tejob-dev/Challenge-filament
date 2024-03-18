<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\CritereImmeuble;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CritereImmeubleControllerTest extends TestCase
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
    public function it_displays_index_view_with_critere_immeubles()
    {
        $critereImmeubles = CritereImmeuble::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('critere-immeubles.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.critere_immeubles.index')
            ->assertViewHas('critereImmeubles');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_critere_immeuble()
    {
        $response = $this->get(route('critere-immeubles.create'));

        $response->assertOk()->assertViewIs('app.critere_immeubles.create');
    }

    /**
     * @test
     */
    public function it_stores_the_critere_immeuble()
    {
        $data = CritereImmeuble::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('critere-immeubles.store'), $data);

        $this->assertDatabaseHas('critere_immeubles', $data);

        $critereImmeuble = CritereImmeuble::latest('id')->first();

        $response->assertRedirect(
            route('critere-immeubles.edit', $critereImmeuble)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_critere_immeuble()
    {
        $critereImmeuble = CritereImmeuble::factory()->create();

        $response = $this->get(
            route('critere-immeubles.show', $critereImmeuble)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.critere_immeubles.show')
            ->assertViewHas('critereImmeuble');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_critere_immeuble()
    {
        $critereImmeuble = CritereImmeuble::factory()->create();

        $response = $this->get(
            route('critere-immeubles.edit', $critereImmeuble)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.critere_immeubles.edit')
            ->assertViewHas('critereImmeuble');
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

        $response = $this->put(
            route('critere-immeubles.update', $critereImmeuble),
            $data
        );

        $data['id'] = $critereImmeuble->id;

        $this->assertDatabaseHas('critere_immeubles', $data);

        $response->assertRedirect(
            route('critere-immeubles.edit', $critereImmeuble)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_critere_immeuble()
    {
        $critereImmeuble = CritereImmeuble::factory()->create();

        $response = $this->delete(
            route('critere-immeubles.destroy', $critereImmeuble)
        );

        $response->assertRedirect(route('critere-immeubles.index'));

        $this->assertDeleted($critereImmeuble);
    }
}
