<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ExigenceImmeuble;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExigenceImmeubleControllerTest extends TestCase
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
    public function it_displays_index_view_with_exigence_immeubles()
    {
        $exigenceImmeubles = ExigenceImmeuble::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('exigence-immeubles.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.exigence_immeubles.index')
            ->assertViewHas('exigenceImmeubles');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_exigence_immeuble()
    {
        $response = $this->get(route('exigence-immeubles.create'));

        $response->assertOk()->assertViewIs('app.exigence_immeubles.create');
    }

    /**
     * @test
     */
    public function it_stores_the_exigence_immeuble()
    {
        $data = ExigenceImmeuble::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('exigence-immeubles.store'), $data);

        $this->assertDatabaseHas('exigence_immeubles', $data);

        $exigenceImmeuble = ExigenceImmeuble::latest('id')->first();

        $response->assertRedirect(
            route('exigence-immeubles.edit', $exigenceImmeuble)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_exigence_immeuble()
    {
        $exigenceImmeuble = ExigenceImmeuble::factory()->create();

        $response = $this->get(
            route('exigence-immeubles.show', $exigenceImmeuble)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.exigence_immeubles.show')
            ->assertViewHas('exigenceImmeuble');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_exigence_immeuble()
    {
        $exigenceImmeuble = ExigenceImmeuble::factory()->create();

        $response = $this->get(
            route('exigence-immeubles.edit', $exigenceImmeuble)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.exigence_immeubles.edit')
            ->assertViewHas('exigenceImmeuble');
    }

    /**
     * @test
     */
    public function it_updates_the_exigence_immeuble()
    {
        $exigenceImmeuble = ExigenceImmeuble::factory()->create();

        $data = [
            'libel' => $this->faker->text(255),
        ];

        $response = $this->put(
            route('exigence-immeubles.update', $exigenceImmeuble),
            $data
        );

        $data['id'] = $exigenceImmeuble->id;

        $this->assertDatabaseHas('exigence_immeubles', $data);

        $response->assertRedirect(
            route('exigence-immeubles.edit', $exigenceImmeuble)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_exigence_immeuble()
    {
        $exigenceImmeuble = ExigenceImmeuble::factory()->create();

        $response = $this->delete(
            route('exigence-immeubles.destroy', $exigenceImmeuble)
        );

        $response->assertRedirect(route('exigence-immeubles.index'));

        $this->assertDeleted($exigenceImmeuble);
    }
}
