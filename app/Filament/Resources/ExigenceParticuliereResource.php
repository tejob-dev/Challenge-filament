<?php

namespace App\Filament\Resources;

use App\Models\ExigenceParticuliere;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\ExigenceParticuliereResource\Pages;

class ExigenceParticuliereResource extends Resource
{
    protected static ?string $model = ExigenceParticuliere::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Les données';

    protected static ?string $label = "Exigences particulières";

    protected static ?string $recordTitleAttribute = 'libel';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                Grid::make(['default' => 0])->schema([
                    TextInput::make('libel')
                        ->label("Libellé")
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->poll('60s')
            ->columns([
                Tables\Columns\TextColumn::make('libel')
                    ->label("Libellé")
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
            ]);
            // ->filters([DateRangeFilter::make('created_at')]);
    }

    public static function getRelations(): array
    {
        return [
            ExigenceParticuliereResource\RelationManagers\AcheteNowsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExigenceParticulieres::route('/'),
            'create' => Pages\CreateExigenceParticuliere::route('/create'),
            'view' => Pages\ViewExigenceParticuliere::route('/{record}'),
            'edit' => Pages\EditExigenceParticuliere::route('/{record}/edit'),
        ];
    }
}
