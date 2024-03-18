<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ExigenceParticuliere;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExigenceParticuliereControllerTest extends TestCase
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
    public function it_displays_index_view_with_exigence_particulieres()
    {
        $exigenceParticulieres = ExigenceParticuliere::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('exigence-particulieres.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.exigence_particulieres.index')
            ->assertViewHas('exigenceParticulieres');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_exigence_particuliere()
    {
        $response = $this->get(route('exigence-particulieres.create'));

        $response
            ->assertOk()
            ->assertViewIs('app.exigence_particulieres.create');
    }

    /**
     * @test
     */
    public function it_stores_the_exigence_particuliere()
    {
        $data = ExigenceParticuliere::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('exigence-particulieres.store'), $data);

        $this->assertDatabaseHas('exigence_particulieres', $data);

        $exigenceParticuliere = ExigenceParticuliere::latest('id')->first();

        $response->assertRedirect(
            route('exigence-particulieres.edit', $exigenceParticuliere)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_exigence_particuliere()
    {
        $exigenceParticuliere = ExigenceParticuliere::factory()->create();

        $response = $this->get(
            route('exigence-particulieres.show', $exigenceParticuliere)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.exigence_particulieres.show')
            ->assertViewHas('exigenceParticuliere');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_exigence_particuliere()
    {
        $exigenceParticuliere = ExigenceParticuliere::factory()->create();

        $response = $this->get(
            route('exigence-particulieres.edit', $exigenceParticuliere)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.exigence_particulieres.edit')
            ->assertViewHas('exigenceParticuliere');
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

        $response = $this->put(
            route('exigence-particulieres.update', $exigenceParticuliere),
            $data
        );

        $data['id'] = $exigenceParticuliere->id;

        $this->assertDatabaseHas('exigence_particulieres', $data);

        $response->assertRedirect(
            route('exigence-particulieres.edit', $exigenceParticuliere)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_exigence_particuliere()
    {
        $exigenceParticuliere = ExigenceParticuliere::factory()->create();

        $response = $this->delete(
            route('exigence-particulieres.destroy', $exigenceParticuliere)
        );

        $response->assertRedirect(route('exigence-particulieres.index'));

        $this->assertDeleted($exigenceParticuliere);
    }
}
