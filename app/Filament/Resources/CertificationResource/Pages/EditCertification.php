<?php

namespace App\Filament\Resources\CertificationResource\Pages;

use App\Models\Certification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\CertificationResource;

class EditCertification extends EditRecord
{
    // use HasExtraInputs;

    protected static string $resource = CertificationResource::class;

}
