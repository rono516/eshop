<?php
namespace App\Filament\Resources\Products\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Product Details')
                    ->inlineLabel()
                    ->schema([
                        TextEntry::make('category.name')
                            ->numeric()->label('Category'),
                        TextEntry::make('name')
                            ->label('Product Name'),
                        TextEntry::make('description')->label('Description')->columnSpanFull(),
                        TextEntry::make('original_price')
                            ->label('Original Price')
                            ->money('kes'),
                        TextEntry::make('selling_price')
                            ->label('Selling Price')
                            ->money('kes'),
                        ImageEntry::make('image')
                            ->disk('public')
                            ->visibility('public'),
                    ]),

                Section::make('Stock Details')
                    ->inlineLabel()
                    ->schema([

                        TextEntry::make('qty')
                            ->numeric()
                            ->label('Stock'),
                        TextEntry::make('tax')
                            ->numeric(),
                        TextEntry::make('status')
                            ->formatStateUsing(fn(int $state): string => $state === 1 ? 'Active' : 'Inactive')
                            ->label('Status')->badge(),
                        TextEntry::make('trending')
                            ->formatStateUsing(fn(int $state): string => $state === 1 ? "Trending" : "Not Trending"),
                        TextEntry::make('created_at')
                            ->dateTime()
                            ->placeholder('-')
                            ->label('Added'),
                        TextEntry::make('updated_at')
                            ->dateTime()
                            ->placeholder('-')
                            ->label('Updated'),
                        //     ->numeric(),
                    ]),
                // TextEntry::make('category_id')
                //     ->numeric(),
                // TextEntry::make('name'),
                // TextEntry::make('description')
                //     ->columnSpanFull(),
                // TextEntry::make('original_price'),
                // TextEntry::make('selling_price'),
                // ImageEntry::make('image')->disk('public')->visibility('public'),
                // TextEntry::make('qty'),
                // TextEntry::make('tax'),
                // TextEntry::make('status')
                //     ->numeric(),
                // TextEntry::make('trending')
                //     ->numeric(),
                // TextEntry::make('created_at')
                //     ->dateTime()
                //     ->placeholder('-'),
                // TextEntry::make('updated_at')
                //     ->dateTime()
                //     ->placeholder('-'),
            ]);
    }
}
