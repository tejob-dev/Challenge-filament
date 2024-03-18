<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\SurfaceAnnexe;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SurfaceAnnexeTest extends TestCase
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
    public function it_gets_surface_annexes_list()
    {
        $surfaceAnnexes = SurfaceAnnexe::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.surface-annexes.index'));

        $response->assertOk()->assertSee($surfaceAnnexes[0]->libel);
    }

    /**
     * @test
     */
    public function it_stores_the_surface_annexe()
    {
        $data = SurfaceAnnexe::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.surface-annexes.store'), $data);

        $this->assertDatabaseHas('surface_annexes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_surface_annexe()
    {
        $surfaceAnnexe = SurfaceAnnexe::factory()->create();

        $data = [
            'libel' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.surface-annexes.update', $surfaceAnnexe),
            $data
        );

        $data['id'] = $surfaceAnnexe->id;

        $this->assertDatabaseHas('surface_annexes', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_surface_annexe()
    {
        $surfaceAnnexe = SurfaceAnnexe::factory()->create();

        $response = $this->deleteJson(
            route('api.surface-annexes.destroy', $surfaceAnnexe)
        );

        $this->assertDeleted($surfaceAnnexe);

        $response->assertNoContent();
    }
}
