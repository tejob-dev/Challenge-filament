<?php

namespace App\Filament\Resources;

use App\Models\ExigenceImmeuble;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\ExigenceImmeubleResource\Pages;

class ExigenceImmeubleResource extends Resource
{
    protected static ?string $model = ExigenceImmeuble::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Les données';

    protected static ?string $label = "Exigence des immeubles";

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
            ExigenceImmeubleResource\RelationManagers\MaisonCertifsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExigenceImmeubles::route('/'),
            'create' => Pages\CreateExigenceImmeuble::route('/create'),
            'view' => Pages\ViewExigenceImmeuble::route('/{record}'),
            'edit' => Pages\EditExigenceImmeuble::route('/{record}/edit'),
        ];
    }
}
