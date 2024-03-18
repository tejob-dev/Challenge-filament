<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\EtatAchat;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EtatAchatTest extends TestCase
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
    public function it_gets_etat_achats_list()
    {
        $etatAchats = EtatAchat::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.etat-achats.index'));

        $response->assertOk()->assertSee($etatAchats[0]->libel);
    }

    /**
     * @test
     */
    public function it_stores_the_etat_achat()
    {
        $data = EtatAchat::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.etat-achats.store'), $data);

        $this->assertDatabaseHas('etat_achats', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_etat_achat()
    {
        $etatAchat = EtatAchat::factory()->create();

        $data = [
            'libel' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.etat-achats.update', $etatAchat),
            $data
        );

        $data['id'] = $etatAchat->id;

        $this->assertDatabaseHas('etat_achats', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_etat_achat()
    {
        $etatAchat = EtatAchat::factory()->create();

        $response = $this->deleteJson(
            route('api.etat-achats.destroy', $etatAchat)
        );

        $this->assertDeleted($etatAchat);

        $response->assertNoContent();
    }
}
