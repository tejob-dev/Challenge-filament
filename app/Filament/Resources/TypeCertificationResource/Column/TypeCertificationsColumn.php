<?php

use Filament\Tables\Columns\TextColumn;

class TypeCertificationsColumn extends TextColumn
{
    protected function getValue($record, $column)
    {
        // Retrieve the type certifications associated with the certification
        $typeCertifications = $record->typeCertifications;

        // Extract the names of type certifications into an array
        $names = $typeCertifications->pluck('libel')->toArray();

        // Return the names joined by a comma
        return implode(', ', $names);
    }
}