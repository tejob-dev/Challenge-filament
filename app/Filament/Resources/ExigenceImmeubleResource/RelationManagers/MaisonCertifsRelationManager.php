<?php

namespace App\Filament\Resources\ExigenceImmeubleResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\RelationManagers\RelationManager;

class MaisonCertifsRelationManager extends RelationManager
{
    protected static string $relationship = 'maisonCertifs';

    protected static ?string $recordTitleAttribute = 'nom_prenom';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 0])->schema([
                TextInput::make('nom_prenom')
                    ->rules(['max:255', 'string'])
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('telephone')
                    ->rules(['max:255', 'string'])
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('email')
                    ->rules(['email'])
                    ->email()
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('surface_habitable')
                    ->rules(['max:255', 'string'])
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('commune')
                    ->rules(['max:255', 'string'])
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Select::make('typelogement')
                    ->rules(['max:255', 'string'])
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
                    ->numeric()
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('nbr_salle')
                    ->rules(['max:255', 'string'])
                    ->numeric()
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Select::make('moment_acquis')
                    ->rules(['max:255', 'string'])
                    ->searchable()
                    ->options([
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
                    ])
                    ->placeholder('Moment Acquis')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('budget')
                    ->rules(['max:255', 'string'])
                    ->numeric()
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Select::make('ma_preference')
                    ->rules(['max:255', 'string'])
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
                    ->numeric()
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Select::make('type_construction')
                    ->rules(['max:255', 'string'])
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
                    ->searchable()
                    ->options([
                        'Fonctionnaire' => 'Fonctionnaire',
                        'Salarié du privé' => 'Salarié du privé',
                        'Chef d entreprise' => 'Chef d entreprise',
                        'Travailleur indépendant' => 'Travailleur indépendant',
                    ])
                    ->placeholder('Type Emploi')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Select::make('proprietaire')
                    ->rules(['max:255', 'string'])
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
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nom_prenom')->limit(50),
                Tables\Columns\TextColumn::make('telephone')->limit(50),
                Tables\Columns\TextColumn::make('email')->limit(50),
                Tables\Columns\TextColumn::make('surface_habitable')->limit(50),
                Tables\Columns\TextColumn::make('commune')->limit(50),
                Tables\Columns\TextColumn::make('typelogement')->enum([
                    'Un appartement' => 'Un appartement',
                    'Villa basse' => 'Villa basse',
                    'Villa duplex' => 'Villa duplex',
                    'Villa triplex' => 'Villa triplex',
                ]),
                Tables\Columns\TextColumn::make('nbr_chambre'),
                Tables\Columns\TextColumn::make('nbr_salle'),
                Tables\Columns\TextColumn::make('moment_acquis')->enum([
                    'Maintenant' => 'Maintenant',
                    'Challenge Express (1an)' => 'Challenge Express (1an)',
                    'Challenge Progressif (2ans)' =>
                        'Challenge Progressif (2ans)',
                    'Challenge Stabilité (3ans)' =>
                        'Challenge Stabilité (3ans)',
                    'Challenge Planifié (4ans)' => 'Challenge Planifié (4ans)',
                    'Challenge Visionnaire (5ans)' =>
                        'Challenge Visionnaire (5ans)',
                ]),
                Tables\Columns\TextColumn::make('budget'),
                Tables\Columns\TextColumn::make('ma_preference')->enum([
                    'Un logement hors promotion immobilière' =>
                        'Un logement hors promotion immobilière',
                    'Un logement dans une promotion immobilière' =>
                        'Un logement dans une promotion immobilière',
                ]),
                Tables\Columns\TextColumn::make('autre_budget'),
                Tables\Columns\TextColumn::make('type_construction')->enum([
                    'logement à construire' => 'logement à construire',
                    'logement prête à habiter' => 'logement prête à habiter',
                    'logement à renover' => 'logement à renover',
                ]),
                Tables\Columns\TextColumn::make('type_emploi')->enum([
                    'Fonctionnaire' => 'Fonctionnaire',
                    'Salarié du privé' => 'Salarié du privé',
                    'Chef d entreprise' => 'Chef d entreprise',
                    'Travailleur indépendant' => 'Travailleur indépendant',
                ]),
                Tables\Columns\TextColumn::make('proprietaire')->enum([
                    'Non' => 'Non',
                    'Oui' => 'Oui',
                ]),
            ])
            ->filters([
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from'),
                        Forms\Components\DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn(
                                    Builder $query,
                                    $date
                                ): Builder => $query->whereDate(
                                    'created_at',
                                    '>=',
                                    $date
                                )
                            )
                            ->when(
                                $data['created_until'],
                                fn(
                                    Builder $query,
                                    $date
                                ): Builder => $query->whereDate(
                                    'created_at',
                                    '<=',
                                    $date
                                )
                            );
                    }),
            ])
            ->headerActions([Tables\Actions\CreateAction::make()])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }
}
