<?php

namespace App\Filament\Resources;

use App\Models\MaisonCertif;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\MaisonCertifResource\Pages;

class MaisonCertifResource extends Resource
{
    protected static ?string $model = MaisonCertif::class;

    protected static ?string $navigationIcon = 'heroicon-o-badge-check';

    protected static ?string $navigationLabel = 'Maison certifiée';

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
                        ->required()
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

                    TextInput::make('surface_habitable')
                        ->rules(['max:255', 'string'])
                        ->nullable()
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

                    Select::make('typelogement')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->searchable()
                        ->options([
                            'Un appartement' => 'Un appartement',
                            'Villa basse' => 'Villa basse',
                            'Villa duplex' => 'Villa duplex',
                            'Villa triplex' => 'Villa triplex',
                        ])
                        ->placeholder('Typelogement')
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

                    TextInput::make('nbr_salle')
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
                        ->nullable()
                        ->searchable()
                        ->options([
                            'Maintenant' => 'Maintenant',
                            'Challenge Express (1an)' =>
                                'Challenge Express (1an)',
                            'Challenge Progressif (2ans)' =>
                                'Challenge Progressif (2ans)',
                            'Challenge Stabilité (3ans)' =>
                                'Challenge Stabilité (3ans)',
                            'Challenge Planifié (4ans)' =>
                                'Challenge Planifié (4ans)',
                            'Challenge Visionnaire (5ans)' =>
                                'Challenge Visionnaire (5ans)',
                        ])
                        ->placeholder('Moment Acquis')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('budget')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->numeric()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Select::make('ma_preference')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->searchable()
                        ->options([
                            'Un logement hors promotion immobilière' =>
                                'Un logement hors promotion immobilière',
                            'Un logement dans une promotion immobilière' =>
                                'Un logement dans une promotion immobilière',
                        ])
                        ->placeholder('Ma Preference')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('autre_budget')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->numeric()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Select::make('type_construction')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->searchable()
                        ->options([
                            'logement à construire' => 'logement à construire',
                            'logement prête à habiter' =>
                                'logement prête à habiter',
                            'logement à renover' => 'logement à renover',
                        ])
                        ->placeholder('Type Construction')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Select::make('type_emploi')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->searchable()
                        ->options([
                            'Fonctionnaire' => 'Fonctionnaire',
                            'Salarié du privé' => 'Salarié du privé',
                            'Chef d entreprise' => 'Chef d entreprise',
                            'Travailleur indépendant' =>
                                'Travailleur indépendant',
                        ])
                        ->placeholder('Type Emploi')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Select::make('proprietaire')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->searchable()
                        ->options([
                            'Non' => 'Non',
                            'Oui' => 'Oui',
                        ])
                        ->placeholder('Proprietaire')
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
                Tables\Columns\TextColumn::make('surface_habitable')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('commune')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('typelogement')
                    ->toggleable()
                    ->searchable()
                    ->enum([
                        'Un appartement' => 'Un appartement',
                        'Villa basse' => 'Villa basse',
                        'Villa duplex' => 'Villa duplex',
                        'Villa triplex' => 'Villa triplex',
                    ]),
                Tables\Columns\TextColumn::make('nbr_chambre')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('nbr_salle')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('moment_acquis')
                    ->toggleable()
                    ->searchable()
                    ->enum([
                        'Maintenant' => 'Maintenant',
                        'Challenge Express (1an)' => 'Challenge Express (1an)',
                        'Challenge Progressif (2ans)' =>
                            'Challenge Progressif (2ans)',
                        'Challenge Stabilité (3ans)' =>
                            'Challenge Stabilité (3ans)',
                        'Challenge Planifié (4ans)' =>
                            'Challenge Planifié (4ans)',
                        'Challenge Visionnaire (5ans)' =>
                            'Challenge Visionnaire (5ans)',
                    ]),
                Tables\Columns\TextColumn::make('budget')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('ma_preference')
                    ->toggleable()
                    ->searchable()
                    ->enum([
                        'Un logement hors promotion immobilière' =>
                            'Un logement hors promotion immobilière',
                        'Un logement dans une promotion immobilière' =>
                            'Un logement dans une promotion immobilière',
                    ]),
                Tables\Columns\TextColumn::make('autre_budget')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('type_construction')
                    ->toggleable()
                    ->searchable()
                    ->enum([
                        'logement à construire' => 'logement à construire',
                        'logement prête à habiter' =>
                            'logement prête à habiter',
                        'logement à renover' => 'logement à renover',
                    ]),
                Tables\Columns\TextColumn::make('type_emploi')
                    ->toggleable()
                    ->searchable()
                    ->enum([
                        'Fonctionnaire' => 'Fonctionnaire',
                        'Salarié du privé' => 'Salarié du privé',
                        'Chef d entreprise' => 'Chef d entreprise',
                        'Travailleur indépendant' => 'Travailleur indépendant',
                    ]),
                Tables\Columns\TextColumn::make('proprietaire')
                    ->toggleable()
                    ->searchable()
                    ->enum([
                        'Non' => 'Non',
                        'Oui' => 'Oui',
                    ]),
            ])
            ->filters([DateRangeFilter::make('created_at')]);
    }

    public static function getRelations(): array
    {
        return [
            MaisonCertifResource\RelationManagers\TypeDeSurfacesRelationManager::class,
            MaisonCertifResource\RelationManagers\CritereImmeublesRelationManager::class,
            MaisonCertifResource\RelationManagers\ExigenceImmeublesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMaisonCertifs::route('/'),
            'create' => Pages\CreateMaisonCertif::route('/create'),
            'view' => Pages\ViewMaisonCertif::route('/{record}'),
            'edit' => Pages\EditMaisonCertif::route('/{record}/edit'),
        ];
    }
}
