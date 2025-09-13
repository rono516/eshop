<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('cate_id')
                    ->required()
                    ->numeric(),
                TextInput::make('name')
                    ->required(),
                // Textarea::make('small_description')
                //     ->default(null)
                //     ->columnSpanFull(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('original_price')
                    ->required(),
                TextInput::make('selling_price')
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->required(),
                TextInput::make('qty')
                    ->required(),
                TextInput::make('tax')
                    ->required(),
                TextInput::make('status')
                    ->required()
                    ->numeric(),
                TextInput::make('trending')
                    ->required()
                    ->numeric(),
                // Textarea::make('meta_title')
                //     ->default(null)
                //     ->columnSpanFull(),
                // Textarea::make('meta_keywords')
                //     ->default(null)
                //     ->columnSpanFull(),
                // Textarea::make('meta_description')
                //     ->default(null)
                //     ->columnSpanFull(),
            ]);
    }
}
