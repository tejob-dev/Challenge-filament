<?php

namespace App\Filament\Resources\TypeDeSurfaceResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\TypeDeSurfaceResource;

class ListTypeDeSurfaces extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = TypeDeSurfaceResource::class;

    protected static ?string $label = 'Configuration Terrain';
}
