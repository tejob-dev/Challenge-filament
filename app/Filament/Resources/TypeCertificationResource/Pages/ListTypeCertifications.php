<?php

namespace App\Filament\Resources\TypeCertificationResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\TypeCertificationResource;

class ListTypeCertifications extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = TypeCertificationResource::class;

    protected static ?string $label = "Type de certification";
}
