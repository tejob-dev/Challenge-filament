<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\TypeCertification;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TypeCertificationControllerTest extends TestCase
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
    public function it_displays_index_view_with_type_certifications()
    {
        $typeCertifications = TypeCertification::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('type-certifications.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.type_certifications.index')
            ->assertViewHas('typeCertifications');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_type_certification()
    {
        $response = $this->get(route('type-certifications.create'));

        $response->assertOk()->assertViewIs('app.type_certifications.create');
    }

    /**
     * @test
     */
    public function it_stores_the_type_certification()
    {
        $data = TypeCertification::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('type-certifications.store'), $data);

        $this->assertDatabaseHas('type_certifications', $data);

        $typeCertification = TypeCertification::latest('id')->first();

        $response->assertRedirect(
            route('type-certifications.edit', $typeCertification)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_type_certification()
    {
        $typeCertification = TypeCertification::factory()->create();

        $response = $this->get(
            route('type-certifications.show', $typeCertification)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.type_certifications.show')
            ->assertViewHas('typeCertification');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_type_certification()
    {
        $typeCertification = TypeCertification::factory()->create();

        $response = $this->get(
            route('type-certifications.edit', $typeCertification)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.type_certifications.edit')
            ->assertViewHas('typeCertification');
    }

    /**
     * @test
     */
    public function it_updates_the_type_certification()
    {
        $typeCertification = TypeCertification::factory()->create();

        $data = [
            'libel' => $this->faker->text(255),
        ];

        $response = $this->put(
            route('type-certifications.update', $typeCertification),
            $data
        );

        $data['id'] = $typeCertification->id;

        $this->assertDatabaseHas('type_certifications', $data);

        $response->assertRedirect(
            route('type-certifications.edit', $typeCertification)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_type_certification()
    {
        $typeCertification = TypeCertification::factory()->create();

        $response = $this->delete(
            route('type-certifications.destroy', $typeCertification)
        );

        $response->assertRedirect(route('type-certifications.index'));

        $this->assertDeleted($typeCertification);
    }
}
