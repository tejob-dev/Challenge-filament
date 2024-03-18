<?php

namespace App\Filament\Resources\ContactResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\ContactResource;

class ListContacts extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = ContactResource::class;
}
