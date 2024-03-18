<?php

namespace App\Filament\Resources\MaisonCertifResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\MaisonCertifResource;

class ListMaisonCertifs extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = MaisonCertifResource::class;
}
