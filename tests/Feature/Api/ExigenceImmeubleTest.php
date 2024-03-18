<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ExigenceImmeuble;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExigenceImmeubleTest extends TestCase
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
    public function it_gets_exigence_immeubles_list()
    {
        $exigenceImmeubles = ExigenceImmeuble::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.exigence-immeubles.index'));

        $response->assertOk()->assertSee($exigenceImmeubles[0]->libel);
    }

    /**
     * @test
     */
    public function it_stores_the_exigence_immeuble()
    {
        $data = ExigenceImmeuble::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.exigence-immeubles.store'),
            $data
        );

        $this->assertDatabaseHas('exigence_immeubles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.exigence-immeubles.update', $exigenceImmeuble),
            $data
        );

        $data['id'] = $exigenceImmeuble->id;

        $this->assertDatabaseHas('exigence_immeubles', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_exigence_immeuble()
    {
        $exigenceImmeuble = ExigenceImmeuble::factory()->create();

        $response = $this->deleteJson(
            route('api.exigence-immeubles.destroy', $exigenceImmeuble)
        );

        $this->assertDeleted($exigenceImmeuble);

        $response->assertNoContent();
    }
}
