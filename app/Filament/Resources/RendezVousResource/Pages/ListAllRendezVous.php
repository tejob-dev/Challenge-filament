<?php

namespace App\Filament\Resources\RendezVousResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\RendezVousResource;

class ListAllRendezVous extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = RendezVousResource::class;
}
