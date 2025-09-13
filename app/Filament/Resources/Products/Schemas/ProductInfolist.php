<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('cate_id')
                    ->numeric(),
                TextEntry::make('name'),
                TextEntry::make('small_description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('description')
                    ->columnSpanFull(),
                TextEntry::make('original_price'),
                TextEntry::make('selling_price'),
                ImageEntry::make('image')->disk('public')->visibility('public'),
                TextEntry::make('qty'),
                TextEntry::make('tax'),
                TextEntry::make('status')
                    ->numeric(),
                TextEntry::make('trending')
                    ->numeric(),
                TextEntry::make('meta_title')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('meta_keywords')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('meta_description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
