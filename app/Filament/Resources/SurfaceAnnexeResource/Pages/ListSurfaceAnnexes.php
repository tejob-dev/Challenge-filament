<?php

namespace App\Filament\Resources\SurfaceAnnexeResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\SurfaceAnnexeResource;

class ListSurfaceAnnexes extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = SurfaceAnnexeResource::class;
}
