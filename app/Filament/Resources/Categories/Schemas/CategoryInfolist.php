<?php
namespace App\Filament\Resources\Categories\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CategoryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Category Details')
                    ->inlineLabel()
                    ->schema([
                        TextEntry::make('name')->label('Title'),
                        TextEntry::make('products_count')->label('Total Products'),
                        // TextEntry::make('products')
                        //     ->label('Products')
                        //     ->formatStateUsing(fn($record) => $record->productsCount()),
                        TextEntry::make('slug')->label('Slug'),
                        TextEntry::make('decription')
                            ->columnSpanFull()
                            ->label('Description'),
                        TextEntry::make('status')
                            ->label('Status')
                            ->formatStateUsing(fn (int $state): string => $state === 1 ? 'Active': "Inactive")
                            ->badge(),
                        TextEntry::make('popular')
                            ->label('Popularity')
                            ->formatStateUsing(fn(int $state): string => $state === 1 ? "Popular": 'Not Popular')
                            ->badge(),
                        TextEntry::make('created_at')
                            ->dateTime()
                            ->placeholder('-')
                            ->label('Added'),
                        TextEntry::make('updated_at')
                            ->dateTime()
                            ->placeholder('-')
                            ->label('Updated'),
                        // TextEntry::make('id')
                        //     ->numeric()->label('Order ID'),
                        // TextEntry::make('status')
                        //     ->label('Delivery Status')
                        //     ->formatStateUsing(fn(int $state): string => $state === 1 ? 'Delivered' : 'Pending delivery'),
                        // TextEntry::make('tracking_no')->label('Tracking No'),
                        // TextEntry::make('order_total')
                        //     ->label('Order Total')
                        //     ->getStateUsing(fn($record) => $record->orderAmount())
                        //     ->money('kes'),
                    ]),
                // TextEntry::make('name'),
                // TextEntry::make('slug'),
                // TextEntry::make('decription')
                //     ->columnSpanFull(),
                Section::make('Category Images')
                    ->inlineLabel()
                    ->schema([
                        ImageEntry::make('image')->disk('public')->visibility('public'),
                        ImageEntry::make('logo')
                            ->placeholder('-'),

                    ]),
                // Section::make('Category Image')
                //     ->inlineLabel()
                //     ->schema([

                //     ]),

            ]);
    }
}
