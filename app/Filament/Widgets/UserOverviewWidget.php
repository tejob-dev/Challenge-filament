<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use App\Models\AcheteNow;
use App\Models\RendezVous;
use App\Models\MaisonCertif;
use App\Models\Certification;
use App\Models\TerrainCertif;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\User; // Replace with your actual User model path

class UserOverviewWidget extends StatsOverviewWidget
{
    protected static string $view = 'filament::widgets.stats-overview-widget';

    protected int | string | array $columnSpan = 2;

    protected function getCards(): array
    {
        return [
            Card::make('Total des comptes', User::count())
                ->icon('heroicon-s-users'),
            Card::make('Acheté Maintenant', AcheteNow::count())
            ->icon('heroicon-o-cube-transparent'),
            Card::make('Maison certifiée', MaisonCertif::count())
            ->icon('heroicon-o-badge-check'),
            Card::make('Terrain certifié', TerrainCertif::count())
            ->icon('heroicon-o-arrows-expand'),
            Card::make('Maison certifiée', MaisonCertif::count())
            ->icon('heroicon-o-badge-check'),
            Card::make('Certifications', Certification::count())
            ->icon('heroicon-o-view-grid'),
            Card::make('Rendez-vous', RendezVous::count())
            ->icon('heroicon-o-link'),
            Card::make('Contacts', Contact::count())
            ->icon('heroicon-o-link'),
            // Card::make('Active Users', User::where('active', true)->count())
            //     ->color('success')
            //     ->icon('heroicon-s-check'),
            // Card::make('Inactive Users', User::where('active', false)->count())
            //     ->color('danger')
            //     ->icon('heroicon-s-x'),
        ];
    }
}
