<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\RendezVous;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RendezVousControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_rendez_vous()
    {
        $allRendezVous = RendezVous::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-rendez-vous.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_rendez_vous.index')
            ->assertViewHas('allRendezVous');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_rendez_vous()
    {
        $response = $this->get(route('all-rendez-vous.create'));

        $response->assertOk()->assertViewIs('app.all_rendez_vous.create');
    }

    /**
     * @test
     */
    public function it_stores_the_rendez_vous()
    {
        $data = RendezVous::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-rendez-vous.store'), $data);

        $this->assertDatabaseHas('rendez_vous', $data);

        $rendezVous = RendezVous::latest('id')->first();

        $response->assertRedirect(route('all-rendez-vous.edit', $rendezVous));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_rendez_vous()
    {
        $rendezVous = RendezVous::factory()->create();

        $response = $this->get(route('all-rendez-vous.show', $rendezVous));

        $response
            ->assertOk()
            ->assertViewIs('app.all_rendez_vous.show')
            ->assertViewHas('rendezVous');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_rendez_vous()
    {
        $rendezVous = RendezVous::factory()->create();

        $response = $this->get(route('all-rendez-vous.edit', $rendezVous));

        $response
            ->assertOk()
            ->assertViewIs('app.all_rendez_vous.edit')
            ->assertViewHas('rendezVous');
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

        $response = $this->put(
            route('all-rendez-vous.update', $rendezVous),
            $data
        );

        $data['id'] = $rendezVous->id;

        $this->assertDatabaseHas('rendez_vous', $data);

        $response->assertRedirect(route('all-rendez-vous.edit', $rendezVous));
    }

    /**
     * @test
     */
    public function it_deletes_the_rendez_vous()
    {
        $rendezVous = RendezVous::factory()->create();

        $response = $this->delete(
            route('all-rendez-vous.destroy', $rendezVous)
        );

        $response->assertRedirect(route('all-rendez-vous.index'));

        $this->assertDeleted($rendezVous);
    }
}
