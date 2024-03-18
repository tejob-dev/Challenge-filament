<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\TypeCertification;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TypeCertificationTest extends TestCase
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
    public function it_gets_type_certifications_list()
    {
        $typeCertifications = TypeCertification::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.type-certifications.index'));

        $response->assertOk()->assertSee($typeCertifications[0]->libel);
    }

    /**
     * @test
     */
    public function it_stores_the_type_certification()
    {
        $data = TypeCertification::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.type-certifications.store'),
            $data
        );

        $this->assertDatabaseHas('type_certifications', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.type-certifications.update', $typeCertification),
            $data
        );

        $data['id'] = $typeCertification->id;

        $this->assertDatabaseHas('type_certifications', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_type_certification()
    {
        $typeCertification = TypeCertification::factory()->create();

        $response = $this->deleteJson(
            route('api.type-certifications.destroy', $typeCertification)
        );

        $this->assertDeleted($typeCertification);

        $response->assertNoContent();
    }
}
