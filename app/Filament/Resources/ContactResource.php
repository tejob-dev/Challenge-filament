<?php

namespace App\Filament\Resources;

use App\Models\Contact;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\ContactResource\Pages;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-alt';

    protected static ?int $navigationSort = 3;
    
    protected static ?string $recordTitleAttribute = 'nom_prenom';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                Grid::make(['default' => 0])->schema([
                    TextInput::make('nom_prenom')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Nom Prenom')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('email')
                        ->rules(['email'])
                        ->nullable()
                        ->email()
                        ->placeholder('Email')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('objet')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Objet')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('telephone')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Telephone')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    RichEditor::make('message')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Message')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    // TextInput::make('your-consent')
                    //     ->rules(['max:255', 'string'])
                    //     ->nullable()
                    //     ->placeholder('Your Consent')
                    //     ->columnSpan([
                    //         'default' => 12,
                    //         'md' => 12,
                    //         'lg' => 12,
                    //     ]),
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
                Tables\Columns\TextColumn::make('email')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('objet')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('telephone')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('message')
                    ->toggleable()
                    ->searchable()
                    ->limit(50),
                // Tables\Columns\TextColumn::make('your-consent')
                //     ->toggleable()
                //     ->searchable(true, null, true)
                //     ->limit(50),
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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'view' => Pages\ViewContact::route('/{record}'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
