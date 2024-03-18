<?php

namespace App\Filament\Resources\CritereImmeubleResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\CritereImmeubleResource;

class ListCritereImmeubles extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = CritereImmeubleResource::class;

    protected static ?string $title = "Quelques critères";
}
