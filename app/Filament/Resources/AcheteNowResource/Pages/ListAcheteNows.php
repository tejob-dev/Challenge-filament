<?php

namespace App\Filament\Resources\AcheteNowResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\AcheteNowResource;

class ListAcheteNows extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = AcheteNowResource::class;
}
