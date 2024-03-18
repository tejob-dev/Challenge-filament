<?php

namespace App\Filament\Resources\CertificationResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\CertificationResource;

class ListCertifications extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = CertificationResource::class;
}
