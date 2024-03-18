<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Certification;
use App\Models\TypeCertification;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TypeCertificationCertificationsTest extends TestCase
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
    public function it_gets_type_certification_certifications()
    {
        $typeCertification = TypeCertification::factory()->create();
        $certification = Certification::factory()->create();

        $typeCertification->certifications()->attach($certification);

        $response = $this->getJson(
            route(
                'api.type-certifications.certifications.index',
                $typeCertification
            )
        );

        $response->assertOk()->assertSee($certification->nom_prenom);
    }

    /**
     * @test
     */
    public function it_can_attach_certifications_to_type_certification()
    {
        $typeCertification = TypeCertification::factory()->create();
        $certification = Certification::factory()->create();

        $response = $this->postJson(
            route('api.type-certifications.certifications.store', [
                $typeCertification,
                $certification,
            ])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $typeCertification
                ->certifications()
                ->where('certifications.id', $certification->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_certifications_from_type_certification()
    {
        $typeCertification = TypeCertification::factory()->create();
        $certification = Certification::factory()->create();

        $response = $this->deleteJson(
            route('api.type-certifications.certifications.store', [
                $typeCertification,
                $certification,
            ])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $typeCertification
                ->certifications()
                ->where('certifications.id', $certification->id)
                ->exists()
        );
    }
}
