<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\AcheteNow;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AcheteNowControllerTest extends TestCase
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
    public function it_displays_index_view_with_achete_nows()
    {
        $acheteNows = AcheteNow::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('achete-nows.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.achete_nows.index')
            ->assertViewHas('acheteNows');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_achete_now()
    {
        $response = $this->get(route('achete-nows.create'));

        $response->assertOk()->assertViewIs('app.achete_nows.create');
    }

    /**
     * @test
     */
    public function it_stores_the_achete_now()
    {
        $data = AcheteNow::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('achete-nows.store'), $data);

        $this->assertDatabaseHas('achete_nows', $data);

        $acheteNow = AcheteNow::latest('id')->first();

        $response->assertRedirect(route('achete-nows.edit', $acheteNow));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_achete_now()
    {
        $acheteNow = AcheteNow::factory()->create();

        $response = $this->get(route('achete-nows.show', $acheteNow));

        $response
            ->assertOk()
            ->assertViewIs('app.achete_nows.show')
            ->assertViewHas('acheteNow');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_achete_now()
    {
        $acheteNow = AcheteNow::factory()->create();

        $response = $this->get(route('achete-nows.edit', $acheteNow));

        $response
            ->assertOk()
            ->assertViewIs('app.achete_nows.edit')
            ->assertViewHas('acheteNow');
    }

    /**
     * @test
     */
    public function it_updates_the_achete_now()
    {
        $acheteNow = AcheteNow::factory()->create();

        $data = [
            'nom_prenom' => $this->faker->text(255),
            'telephone' => $this->faker->text(255),
            'email' => $this->faker->email,
            'ou_recherchez_vous' => $this->faker->text(255),
            'typelogement' => $this->faker->text(255),
            'surface-recherch' => $this->faker->text(255),
            'min_budget' => $this->faker->text(255),
            'max_budget' => $this->faker->text(255),
            'nbr_piece' => $this->faker->text(255),
            'nbr_chambre' => $this->faker->text(255),
            'surface' => $this->faker->text(255),
            'criter_appart' => $this->faker->text(255),
            'filtrag_annonce' => $this->faker->text(255),
        ];

        $response = $this->put(route('achete-nows.update', $acheteNow), $data);

        $data['id'] = $acheteNow->id;

        $this->assertDatabaseHas('achete_nows', $data);

        $response->assertRedirect(route('achete-nows.edit', $acheteNow));
    }

    /**
     * @test
     */
    public function it_deletes_the_achete_now()
    {
        $acheteNow = AcheteNow::factory()->create();

        $response = $this->delete(route('achete-nows.destroy', $acheteNow));

        $response->assertRedirect(route('achete-nows.index'));

        $this->assertDeleted($acheteNow);
    }
}
