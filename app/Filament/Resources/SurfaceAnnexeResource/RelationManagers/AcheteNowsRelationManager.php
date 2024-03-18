<?php

namespace App\Filament\Resources\SurfaceAnnexeResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\RelationManagers\RelationManager;

class AcheteNowsRelationManager extends RelationManager
{
    protected static string $relationship = 'acheteNows';

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

                TextInput::make('ou_recherchez_vous')
                    ->rules(['max:255', 'string'])
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('typelogement')
                    ->rules(['max:255', 'string'])
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('surface-recherch')
                    ->rules(['max:255', 'string'])
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('criter_appart')
                    ->rules(['max:255', 'string'])
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('filtrag_annonce')
                    ->rules(['max:255', 'string'])
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('min_budget')
                    ->rules(['max:255', 'string'])
                    ->numeric()
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Select::make('typelogement')
                    ->rules(['max:255', 'string'])
                    ->searchable()
                    ->options([
                        'Appartement' => 'Appartement',
                        'Villa basse' => 'Villa basse',
                        'Villa duplex' => 'Villa duplex',
                        'Villa triplex' => 'Villa triplex',
                        'Terrain' => 'Terrain',
                    ])
                    ->placeholder('Typelogement')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('max_budget')
                    ->rules(['max:255', 'string'])
                    ->numeric()
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Select::make('criter_appart')
                    ->rules(['max:255', 'string'])
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
                    ->numeric()
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Select::make('filtrag_annonce')
                    ->rules(['max:255', 'string'])
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
                    ->numeric()
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('surface')
                    ->rules(['max:255', 'string'])
                    ->numeric()
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
                Tables\Columns\TextColumn::make('ou_recherchez_vous')->limit(
                    50
                ),
                Tables\Columns\TextColumn::make('typelogement')->limit(50),
                Tables\Columns\TextColumn::make('surface-recherch')->limit(50),
                Tables\Columns\TextColumn::make('criter_appart')->limit(50),
                Tables\Columns\TextColumn::make('filtrag_annonce')->limit(50),
                Tables\Columns\TextColumn::make('min_budget'),
                Tables\Columns\TextColumn::make('typelogement')->enum([
                    'Appartement' => 'Appartement',
                    'Villa basse' => 'Villa basse',
                    'Villa duplex' => 'Villa duplex',
                    'Villa triplex' => 'Villa triplex',
                    'Terrain' => 'Terrain',
                ]),
                Tables\Columns\TextColumn::make('max_budget'),
                Tables\Columns\TextColumn::make('criter_appart')->enum([
                    'Dernier etage' => 'Dernier etage',
                    'Rez-de-chaussee' => 'Rez-de-chaussee',
                    'Eviter le rez-de-chaussee' => 'Eviter le rez-de-chaussee',
                ]),
                Tables\Columns\TextColumn::make('nbr_piece'),
                Tables\Columns\TextColumn::make('filtrag_annonce')->enum([
                    'Exclusivite' => 'Exclusivite',
                    'Avant-premiere' => 'Avant-premiere',
                    'Avec photo' => 'Avec photo',
                ]),
                Tables\Columns\TextColumn::make('nbr_chambre'),
                Tables\Columns\TextColumn::make('surface'),
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
