<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);
        $this->call(PermissionsSeeder::class);

        $this->call(AcheteNowSeeder::class);
        $this->call(CertificationSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(CritereImmeubleSeeder::class);
        $this->call(EtatAchatSeeder::class);
        $this->call(ExigenceImmeubleSeeder::class);
        $this->call(ExigenceParticuliereSeeder::class);
        $this->call(MaisonCertifSeeder::class);
        $this->call(RendezVousSeeder::class);
        $this->call(SurfaceAnnexeSeeder::class);
        $this->call(TerrainCertifSeeder::class);
        $this->call(TypeCertificationSeeder::class);
        $this->call(TypeDeSurfaceSeeder::class);
        $this->call(UserSeeder::class);
    }
}
