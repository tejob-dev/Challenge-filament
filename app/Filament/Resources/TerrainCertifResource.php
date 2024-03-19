<?php

namespace App\Filament\Resources;

use App\Models\TerrainCertif;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\TerrainCertifResource\Pages;

class TerrainCertifResource extends Resource
{
    protected static ?string $model = TerrainCertif::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrows-expand';

    protected static ?string $navigationLabel = 'Terrain certifié';

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

                    TextInput::make('commune')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('info_spplement')
                        ->rules(['max:255', 'string'])
                        ->nullable()
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

                    Select::make('obj_achat')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->searchable()
                        ->options([
                            'Résidentiel' => 'Résidentiel',
                            'Commercial' => 'Commercial',
                            'Agricole' => 'Agricole',
                        ])
                        ->placeholder('Obj Achat')
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

                    Select::make('moment_acquis')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->searchable()
                        ->options([
                            'Dans l immédiat' => 'Dans l immédiat',
                            'Dans 6 mois' => 'Dans 6 mois',
                            'Dans 1 an' => 'Dans 1 an',
                            'Dans 2 ans' => 'Dans 2 ans',
                            'Dans 3 ans' => 'Dans 3 ans',
                            'Dans 4 ans' => 'Dans 4 ans',
                            'Dans 5 ans' => 'Dans 5 ans',
                        ])
                        ->placeholder('Moment Acquis')
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

                    Select::make('config_terrain')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->searchable()
                        ->options([
                            'Plat' => 'Plat',
                            'En pente' => 'En pente',
                            'Autre' => 'Autre',
                        ])
                        ->placeholder('Config Terrain')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('prec_config_terrain')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Select::make('financement')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->searchable()
                        ->options([
                            'Cash' => 'Cash',
                            'Echelonné jusqu à 12 mois' =>
                                'Echelonné jusqu à 12 mois',
                            'Crédit bancaire' => 'Crédit bancaire',
                        ])
                        ->placeholder('Financement')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Select::make('votre_poste')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->searchable()
                        ->options([
                            'Fonctionnaire' => 'Fonctionnaire',
                            'Salarié du privé' => 'Salarié du privé',
                            'Travailleur indépendant' =>
                                'Travailleur indépendant',
                            'Organisation Internationale' =>
                                'Organisation Internationale',
                            'Chef d entreprise' => 'Chef d entreprise',
                            'Autre' => 'Autre',
                        ])
                        ->placeholder('Votre Poste')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Select::make('partic_group')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->searchable()
                        ->options([
                            'Particulier' => 'Particulier',
                            'Groupement' => 'Groupement',
                        ])
                        ->placeholder('Partic Group')
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
                Tables\Columns\TextColumn::make('commune')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('info_spplement')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('surface')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('obj_achat')
                    ->toggleable()
                    ->searchable()
                    ->enum([
                        'Résidentiel' => 'Résidentiel',
                        'Commercial' => 'Commercial',
                        'Agricole' => 'Agricole',
                    ]),
                Tables\Columns\TextColumn::make('min_budget')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('moment_acquis')
                    ->toggleable()
                    ->searchable()
                    ->enum([
                        'Dans l immédiat' => 'Dans l immédiat',
                        'Dans 6 mois' => 'Dans 6 mois',
                        'Dans 1 an' => 'Dans 1 an',
                        'Dans 2 ans' => 'Dans 2 ans',
                        'Dans 3 ans' => 'Dans 3 ans',
                        'Dans 4 ans' => 'Dans 4 ans',
                        'Dans 5 ans' => 'Dans 5 ans',
                    ]),
                Tables\Columns\TextColumn::make('max_budget')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('config_terrain')
                    ->toggleable()
                    ->searchable()
                    ->enum([
                        'Plat' => 'Plat',
                        'En pente' => 'En pente',
                        'Autre' => 'Autre',
                    ]),
                Tables\Columns\TextColumn::make('prec_config_terrain')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('financement')
                    ->toggleable()
                    ->searchable()
                    ->enum([
                        'Cash' => 'Cash',
                        'Echelonné jusqu à 12 mois' =>
                            'Echelonné jusqu à 12 mois',
                        'Crédit bancaire' => 'Crédit bancaire',
                    ]),
                Tables\Columns\TextColumn::make('votre_poste')
                    ->toggleable()
                    ->searchable()
                    ->enum([
                        'Fonctionnaire' => 'Fonctionnaire',
                        'Salarié du privé' => 'Salarié du privé',
                        'Travailleur indépendant' => 'Travailleur indépendant',
                        'Organisation Internationale' =>
                            'Organisation Internationale',
                        'Chef d entreprise' => 'Chef d entreprise',
                        'Autre' => 'Autre',
                    ]),
                Tables\Columns\TextColumn::make('partic_group')
                    ->toggleable()
                    ->searchable()
                    ->enum([
                        'Particulier' => 'Particulier',
                        'Groupement' => 'Groupement',
                    ]),
                ]);
            // ->filters([DateRangeFilter::make('created_at')]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTerrainCertifs::route('/'),
            'create' => Pages\CreateTerrainCertif::route('/create'),
            'view' => Pages\ViewTerrainCertif::route('/{record}'),
            'edit' => Pages\EditTerrainCertif::route('/{record}/edit'),
        ];
    }
}
