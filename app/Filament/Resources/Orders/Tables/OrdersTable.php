<?php

namespace App\Filament\Resources\Orders\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user_id')
                    ->label('User ID')
                    ->searchable(),
                TextColumn::make('fname')
                    ->searchable()
                    ->label("First Name"),
                TextColumn::make('lname')
                    ->searchable()
                    ->label('Last Name')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('phone')
                    ->searchable()
                    ->label('Phone'),
                TextColumn::make('address1')
                    ->searchable()
                    ->label('Address')
                    ->toggleable(isToggledHiddenByDefault: true),

                // TextColumn::make('address2')
                //     ->searchable(),
                TextColumn::make('town')
                    ->searchable(),
                // TextColumn::make('county')
                //     ->searchable(),
                // TextColumn::make('status')
                //     ->numeric()
                //     ->sortable(),
                TextColumn::make('status')
                            ->label('Status')
                            ->formatStateUsing(fn(int $state): string => $state ===1 ? 'Delivered': 'Pending delivery'),
                // TextColumn::make('message')
                //     ->searchable(),
                TextColumn::make('tracking_no')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Ordered')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Updated')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
