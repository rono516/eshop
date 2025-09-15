<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('decription')
                    ->required()
                    ->columnSpanFull(),
                // TextInput::make('status')
                //     ->required()
                //     ->numeric()
                //     ->default(0),
                Select::make('status')
                    ->options([
                        '1' => 'Active',
                        '0' => 'Inactive',
                    ])
                    ->native(false)
                    ->required(),
                // TextInput::make('popular')
                //     ->required()
                //     ->numeric()
                //     ->default(0),
                Select::make('popular')
                    ->options([
                        '1' => 'Popular',
                        '0' => 'Not Popular',
                    ])
                    ->native(false)
                    ->required(),
                FileUpload::make('image')
                    ->disk('public') 
                    ->directory('category')
                    ->image()
                    ->required(),
                // TextInput::make('meta_title')
                //     ->default(null),
                // TextInput::make('meta_decrip')
                //     ->default(null),
                // TextInput::make('meta_keywords')
                //     ->default(null),
                TextInput::make('logo')
                    ->default(null),
            ]);
    }
}
