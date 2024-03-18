<?php

namespace App\Filament\Resources;

use App\Models\AcheteNow;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\AcheteNowResource\Pages;

class AcheteNowResource extends Resource
{
    protected static ?string $model = AcheteNow::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube-transparent';

    protected static ?string $navigationLabel = 'Acheté Maintenant';

    protected static ?string $navigationGroup = 'Les formulaires';

    protected static ?string $recordTitleAttribute = 'nom_prenom';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                Grid::make(['default' => 0])->schema([
                    TextInput::make('nom_prenom')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('telephone')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('email')
                        ->rules(['email'])
                        ->nullable()
                        ->email()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('ou_recherchez_vous')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('typelogement')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('surface-recherch')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('criter_appart')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('filtrag_annonce')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('min_budget')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->numeric()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Select::make('typelogement')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->searchable()
                        ->options([
                            'Appartement' => 'Appartement',
                            'Villa basse' => 'Villa basse',
                            'Villa duplex' => 'Villa duplex',
                            'Villa triplex' => 'Villa triplex',
                            'Terrain' => 'Terrain',
                        ])
                        ->placeholder('Type de logement')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('max_budget')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->numeric()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Select::make('criter_appart')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->searchable()
                        ->options([
                            'Dernier etage' => 'Dernier etage',
                            'Rez-de-chaussee' => 'Rez-de-chaussee',
                            'Eviter le rez-de-chaussee' =>
                                'Eviter le rez-de-chaussee',
                        ])
                        ->placeholder('Criter Appart')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('nbr_piece')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->numeric()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Select::make('filtrag_annonce')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->searchable()
                        ->options([
                            'Exclusivite' => 'Exclusivite',
                            'Avant-premiere' => 'Avant-premiere',
                            'Avec photo' => 'Avec photo',
                        ])
                        ->placeholder('Filtrag Annonce')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('nbr_chambre')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->numeric()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('surface')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->numeric()
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
                Tables\Columns\TextColumn::make('nom_prenom')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('telephone')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('email')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('ou_recherchez_vous')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('typelogement')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('surface-recherch')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('criter_appart')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('filtrag_annonce')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('min_budget')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('typelogement')
                    ->toggleable()
                    ->searchable()
                    ->enum([
                        'Appartement' => 'Appartement',
                        'Villa basse' => 'Villa basse',
                        'Villa duplex' => 'Villa duplex',
                        'Villa triplex' => 'Villa triplex',
                        'Terrain' => 'Terrain',
                    ]),
                Tables\Columns\TextColumn::make('max_budget')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('criter_appart')
                    ->toggleable()
                    ->searchable()
                    ->enum([
                        'Dernier etage' => 'Dernier etage',
                        'Rez-de-chaussee' => 'Rez-de-chaussee',
                        'Eviter le rez-de-chaussee' =>
                            'Eviter le rez-de-chaussee',
                    ]),
                Tables\Columns\TextColumn::make('nbr_piece')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('filtrag_annonce')
                    ->toggleable()
                    ->searchable()
                    ->enum([
                        'Exclusivite' => 'Exclusivite',
                        'Avant-premiere' => 'Avant-premiere',
                        'Avec photo' => 'Avec photo',
                    ]),
                Tables\Columns\TextColumn::make('nbr_chambre')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('surface')
                    ->toggleable()
                    ->searchable(true, null, true),
            ])
            ->filters([DateRangeFilter::make('created_at')]);
    }

    public static function getRelations(): array
    {
        return [
            AcheteNowResource\RelationManagers\EtatAchatsRelationManager::class,
            AcheteNowResource\RelationManagers\ExigenceParticulieresRelationManager::class,
            AcheteNowResource\RelationManagers\SurfaceAnnexesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAcheteNows::route('/'),
            'create' => Pages\CreateAcheteNow::route('/create'),
            'view' => Pages\ViewAcheteNow::route('/{record}'),
            'edit' => Pages\EditAcheteNow::route('/{record}/edit'),
        ];
    }
}
