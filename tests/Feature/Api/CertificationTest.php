<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Certification;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CertificationTest extends TestCase
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
    public function it_gets_certifications_list()
    {
        $certifications = Certification::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.certifications.index'));

        $response->assertOk()->assertSee($certifications[0]->nom_prenom);
    }

    /**
     * @test
     */
    public function it_stores_the_certification()
    {
        $data = Certification::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.certifications.store'), $data);

        $this->assertDatabaseHas('certifications', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.certifications.update', $certification),
            $data
        );

        $data['id'] = $certification->id;

        $this->assertDatabaseHas('certifications', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_certification()
    {
        $certification = Certification::factory()->create();

        $response = $this->deleteJson(
            route('api.certifications.destroy', $certification)
        );

        $this->assertDeleted($certification);

        $response->assertNoContent();
    }
}
