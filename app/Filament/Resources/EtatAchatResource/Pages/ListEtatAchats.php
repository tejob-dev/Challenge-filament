<?php

namespace App\Filament\Resources\EtatAchatResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\EtatAchatResource;

class ListEtatAchats extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = EtatAchatResource::class;

    protected static ?string $label = "Etat de l'achat";
}
