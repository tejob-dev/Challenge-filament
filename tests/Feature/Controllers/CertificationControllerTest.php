<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Certification;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CertificationControllerTest extends TestCase
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
    public function it_displays_index_view_with_certifications()
    {
        $certifications = Certification::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('certifications.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.certifications.index')
            ->assertViewHas('certifications');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_certification()
    {
        $response = $this->get(route('certifications.create'));

        $response->assertOk()->assertViewIs('app.certifications.create');
    }

    /**
     * @test
     */
    public function it_stores_the_certification()
    {
        $data = Certification::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('certifications.store'), $data);

        $this->assertDatabaseHas('certifications', $data);

        $certification = Certification::latest('id')->first();

        $response->assertRedirect(route('certifications.edit', $certification));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_certification()
    {
        $certification = Certification::factory()->create();

        $response = $this->get(route('certifications.show', $certification));

        $response
            ->assertOk()
            ->assertViewIs('app.certifications.show')
            ->assertViewHas('certification');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_certification()
    {
        $certification = Certification::factory()->create();

        $response = $this->get(route('certifications.edit', $certification));

        $response
            ->assertOk()
            ->assertViewIs('app.certifications.edit')
            ->assertViewHas('certification');
    }

    /**
     * @test
     */
    public function it_updates_the_certification()
    {
        $certification = Certification::factory()->create();

        $data = [
            'nom_prenom' => $this->faker->text(255),
            'adresse' => $this->faker->text(255),
            'email' => $this->faker->email,
            'contact' => $this->faker->text(255),
            'typebien' => $this->faker->text(255),
        ];

        $response = $this->put(
            route('certifications.update', $certification),
            $data
        );

        $data['id'] = $certification->id;

        $this->assertDatabaseHas('certifications', $data);

        $response->assertRedirect(route('certifications.edit', $certification));
    }

    /**
     * @test
     */
    public function it_deletes_the_certification()
    {
        $certification = Certification::factory()->create();

        $response = $this->delete(
            route('certifications.destroy', $certification)
        );

        $response->assertRedirect(route('certifications.index'));

        $this->assertDeleted($certification);
    }
}
