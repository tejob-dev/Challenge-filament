<?php

namespace App\Filament\Resources\TerrainCertifResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\TerrainCertifResource;

class ListTerrainCertifs extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = TerrainCertifResource::class;
}
