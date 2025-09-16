<?php
namespace App\Filament\Resources\Orders\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class OrderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user_id'),
                TextEntry::make('fname'),
                TextEntry::make('lname'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('phone'),
                TextEntry::make('address1'),
                // TextEntry::make('address2')
                //     ->placeholder('-'),
                TextEntry::make('town'),
                // TextEntry::make('county')
                //     ->placeholder('-'),
                TextEntry::make('status')
                    ->numeric(),
                // TextEntry::make('message')
                //     ->placeholder('-'),
                TextEntry::make('tracking_no'),
                // TextEntry::make('created_at')
                //     ->dateTime()
                //     ->placeholder('-'),
                // TextEntry::make('updated_at')
                //     ->dateTime()
                //     ->placeholder('-'),
                TextEntry::make('order_total')
                    ->label('Order Total')
                    ->getStateUsing(fn($record) => $record->orderAmount())
                    ->money('kes'),
            ]);
    }
}
