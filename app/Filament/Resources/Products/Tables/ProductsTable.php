<?php
namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('original_price')
                    ->searchable(),
                TextColumn::make('selling_price')
                    ->searchable(),
                ImageColumn::make('image')->disk('public')->visibility('public'),
                TextColumn::make('qty')
                    ->searchable(),
                TextColumn::make('tax')
                    ->searchable(),
                TextColumn::make('status')
                    ->formatStateUsing(fn(int $state): string => $state === 1 ? 'Active' : 'Inactive')
                    ->label('Status')->badge(),
                TextColumn::make('trending')
                    ->formatStateUsing(fn(int $state): string => $state === 1 ? "Trending" : "Not Trending"),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
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
