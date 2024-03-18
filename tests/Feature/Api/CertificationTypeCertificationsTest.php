<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Certification;
use App\Models\TypeCertification;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CertificationTypeCertificationsTest extends TestCase
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
    public function it_gets_certification_type_certifications()
    {
        $certification = Certification::factory()->create();
        $typeCertification = TypeCertification::factory()->create();

        $certification->typeCertifications()->attach($typeCertification);

        $response = $this->getJson(
            route(
                'api.certifications.type-certifications.index',
                $certification
            )
        );

        $response->assertOk()->assertSee($typeCertification->libel);
    }

    /**
     * @test
     */
    public function it_can_attach_type_certifications_to_certification()
    {
        $certification = Certification::factory()->create();
        $typeCertification = TypeCertification::factory()->create();

        $response = $this->postJson(
            route('api.certifications.type-certifications.store', [
                $certification,
                $typeCertification,
            ])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $certification
                ->typeCertifications()
                ->where('type_certifications.id', $typeCertification->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_type_certifications_from_certification()
    {
        $certification = Certification::factory()->create();
        $typeCertification = TypeCertification::factory()->create();

        $response = $this->deleteJson(
            route('api.certifications.type-certifications.store', [
                $certification,
                $typeCertification,
            ])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $certification
                ->typeCertifications()
                ->where('type_certifications.id', $typeCertification->id)
                ->exists()
        );
    }
}
