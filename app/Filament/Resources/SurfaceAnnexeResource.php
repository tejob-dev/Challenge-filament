<?php

namespace App\Filament\Resources;

use App\Models\SurfaceAnnexe;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\SurfaceAnnexeResource\Pages;

class SurfaceAnnexeResource extends Resource
{
    protected static ?string $model = SurfaceAnnexe::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Les données';

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
            SurfaceAnnexeResource\RelationManagers\AcheteNowsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSurfaceAnnexes::route('/'),
            'create' => Pages\CreateSurfaceAnnexe::route('/create'),
            'view' => Pages\ViewSurfaceAnnexe::route('/{record}'),
            'edit' => Pages\EditSurfaceAnnexe::route('/{record}/edit'),
        ];
    }
}
