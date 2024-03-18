<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\EtatAchat;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EtatAchatControllerTest extends TestCase
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
    public function it_displays_index_view_with_etat_achats()
    {
        $etatAchats = EtatAchat::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('etat-achats.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.etat_achats.index')
            ->assertViewHas('etatAchats');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_etat_achat()
    {
        $response = $this->get(route('etat-achats.create'));

        $response->assertOk()->assertViewIs('app.etat_achats.create');
    }

    /**
     * @test
     */
    public function it_stores_the_etat_achat()
    {
        $data = EtatAchat::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('etat-achats.store'), $data);

        $this->assertDatabaseHas('etat_achats', $data);

        $etatAchat = EtatAchat::latest('id')->first();

        $response->assertRedirect(route('etat-achats.edit', $etatAchat));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_etat_achat()
    {
        $etatAchat = EtatAchat::factory()->create();

        $response = $this->get(route('etat-achats.show', $etatAchat));

        $response
            ->assertOk()
            ->assertViewIs('app.etat_achats.show')
            ->assertViewHas('etatAchat');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_etat_achat()
    {
        $etatAchat = EtatAchat::factory()->create();

        $response = $this->get(route('etat-achats.edit', $etatAchat));

        $response
            ->assertOk()
            ->assertViewIs('app.etat_achats.edit')
            ->assertViewHas('etatAchat');
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

        $response = $this->put(route('etat-achats.update', $etatAchat), $data);

        $data['id'] = $etatAchat->id;

        $this->assertDatabaseHas('etat_achats', $data);

        $response->assertRedirect(route('etat-achats.edit', $etatAchat));
    }

    /**
     * @test
     */
    public function it_deletes_the_etat_achat()
    {
        $etatAchat = EtatAchat::factory()->create();

        $response = $this->delete(route('etat-achats.destroy', $etatAchat));

        $response->assertRedirect(route('etat-achats.index'));

        $this->assertDeleted($etatAchat);
    }
}
