<?php

namespace App\Filament\Resources\Employees\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EmployeeForm
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
                    TextInput::make('job_title')
                        ->label(__('sidebar.job_title')),
                    TextInput::make('email')
                        ->email(),
                    Select::make('type_of_employee')
                        ->label(__('sidebar.type_of_employee'))
                        ->options([
                            'DIRECTOR' => 'Director',
                            'EMPLOYEE' => 'Employee',
                        ])
                        ->default('EMPLOYEE')
                        ->required(),
                ])->columns(1),
                Section::make()
                    ->schema([
                        FileUpload::make('image')
                            ->label(__('sidebar.image'))
                            ->image()
                            ->saveToImageKit(),
                ])->columns(1)
            ])->columns(2);
    }
}
