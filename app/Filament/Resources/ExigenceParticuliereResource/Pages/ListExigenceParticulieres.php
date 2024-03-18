<?php

namespace App\Filament\Resources\ExigenceParticuliereResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\ExigenceParticuliereResource;

class ListExigenceParticulieres extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = ExigenceParticuliereResource::class;

    protected static ?string $label = "Exigences particulières";
}
