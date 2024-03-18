<?php

namespace App\Filament\Resources\ExigenceImmeubleResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\ExigenceImmeubleResource;

class ListExigenceImmeubles extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = ExigenceImmeubleResource::class;

    protected static ?string $label = "Exigence des immeubles";
}
