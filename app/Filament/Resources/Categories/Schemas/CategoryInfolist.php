<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CategoryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('slug'),
                TextEntry::make('decription')
                    ->columnSpanFull(),
                TextEntry::make('status')
                    ->numeric(),
                TextEntry::make('popular')
                    ->numeric(),
                ImageEntry::make('image'),
                TextEntry::make('meta_title')
                    ->placeholder('-'),
                TextEntry::make('meta_decrip')
                    ->placeholder('-'),
                TextEntry::make('meta_keywords')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('logo')
                    ->placeholder('-'),
            ]);
    }
}
