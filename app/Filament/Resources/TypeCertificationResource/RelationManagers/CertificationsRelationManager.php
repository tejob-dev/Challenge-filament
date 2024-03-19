<?php

namespace App\Filament\Resources\TypeCertificationResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\RelationManagers\RelationManager;

class CertificationsRelationManager extends RelationManager
{
    protected static string $relationship = 'certifications';

    protected static ?string $recordTitleAttribute = 'nom_prenom';

    protected static ?string $label = 'Certifications';

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

                TextInput::make('adresse')
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

                TextInput::make('contact')
                    ->rules(['max:255', 'string'])
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Select::make('typebien')
                    ->rules(['max:255', 'string'])
                    ->searchable()
                    ->options([
                        'Maison' => 'Maison',
                        'Terrain' => 'Terrain',
                    ])
                    ->placeholder('Typebien')
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
                Tables\Columns\TextColumn::make('adresse')->limit(50),
                Tables\Columns\TextColumn::make('email')->limit(50),
                Tables\Columns\TextColumn::make('contact')->limit(50),
                Tables\Columns\TextColumn::make('typebien')->enum([
                    'Maison' => 'Maison',
                    'Terrain' => 'Terrain',
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
