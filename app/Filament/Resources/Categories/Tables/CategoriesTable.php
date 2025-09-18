<?php
namespace App\Filament\Resources\Categories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                // TextColumn::make('slug')
                //     ->searchable(),
                // TextColumn::make('status')
                //     ->numeric()
                //     ->sortable(),
                // TextColumn::make('popular')
                //     ->numeric()
                //     ->sortable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn(int $state): string => $state === 1 ? 'Active' : "Inactive")
                    ->badge(),
                TextColumn::make('popular')
                    ->label('Popularity')
                    ->formatStateUsing(fn(int $state): string => $state === 1 ? "Popular" : 'Not Popular')
                    ->badge(),
                // TextColumn::make('image')
                //     ->numeric()
                //     ->sortable(),
                // ImageColumn::make('image')
                //     ->disk('public')
                //     ->visibility('public'),
                ImageColumn::make('image')
                    ->disk('public')
                    ->url(fn($record) => asset('storage/' . $record->image)),
                // TextColumn::make('meta_title')
                //     ->searchable(),
                // TextColumn::make('meta_decrip')
                //     ->searchable(),
                // TextColumn::make('meta_keywords')
                //     ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                ImageColumn::make('logo'),
                // TextColumn::make('logo')
                //     ->searchable(),
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
