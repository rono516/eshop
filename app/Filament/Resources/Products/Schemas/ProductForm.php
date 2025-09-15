<?php
namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->required()
                    ->relationship('category', 'name')
                    ->required(),
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
                    ->disk('public')
                    ->directory('product')
                    ->image()
                    ->required(),
                TextInput::make('qty')
                    ->required(),
                TextInput::make('tax')
                    ->required(),
                Select::make('status')
                    ->options([
                        '1' => 'Active',
                        '0' => 'Inactive',
                    ])
                    ->native(false)
                    ->required(),
                Select::make('trending')
                    ->options([
                        '1' => 'Trending',
                        '0' => 'Not Trending',
                    ])
                    ->native(false)
                    ->required(),
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
