<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required(),
                TextInput::make('fname')
                    ->required(),
                TextInput::make('lname')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('address1')
                    ->required(),
                TextInput::make('address2')
                    ->default(null),
                TextInput::make('town')
                    ->required(),
                TextInput::make('county')
                    ->default(null),
                TextInput::make('status')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('message')
                    ->default(null),
                TextInput::make('tracking_no')
                    ->required(),
            ]);
    }
}
