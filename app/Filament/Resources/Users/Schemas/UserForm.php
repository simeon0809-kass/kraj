<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                ->schema([
                    TextInput::make('name')
                        ->label(__('sidebar.name'))
                        ->required(),
                    TextInput::make('email')
                        ->label(__('sidebar.email'))
                        ->email()
                        ->required(),
                    TextInput::make('password')
                        ->label(__('sidebar.password')) 
                        ->password()
                        ->required(),
                    Select::make('role')
                        ->label(__('sidebar.role'))
                        ->options([
                            'ADMIN' => 'Admin',
                            'EDUCATOR' => 'Educator',
                            'SECURITY' => 'Security',
                        ])
                        ->required(),
                ])->columnSpanFull()
                
            ]);
    }
}
