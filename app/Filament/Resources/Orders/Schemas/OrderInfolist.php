<?php
namespace App\Filament\Resources\Orders\Schemas;

// use Filament\Infolists\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OrderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('User Details')
                    ->inlineLabel()
                    ->schema([
                        // TextInput::make('name'),
                        // TextInput::make('email')
                        //     ->label('Email address'),
                        // TextInput::make('phone')
                        //     ->label('Phone number'),
                        TextEntry::make('user_id')->label("User ID"),
                        TextEntry::make('fname')->label('First Name'),
                        TextEntry::make('lname')->label('Last Name'),
                        TextEntry::make('email')
                            ->label('Email address'),
                        TextEntry::make('phone')->label('Phone No'),
                        TextEntry::make('address1')->label('Address'),
                        TextEntry::make('town')->label('Town'),
                    ]),
                Section::make('Order Details')
                    ->inlineLabel()
                    ->schema([
                        TextEntry::make('id')
                            ->numeric()->label('Order ID'),
                        TextEntry::make('status')
                            ->label('Delivery Status')
                            ->formatStateUsing(fn(int $state): string => $state ===1 ? 'Delivered': 'Pending delivery'),
                        TextEntry::make('tracking_no')->label('Tracking No'),
                        TextEntry::make('order_total')
                            ->label('Order Total')
                            ->getStateUsing(fn($record) => $record->orderAmount())
                            ->money('kes'),
                    ]),

            ]);
    }
}
