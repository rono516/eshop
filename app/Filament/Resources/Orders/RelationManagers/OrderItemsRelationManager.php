<?php

namespace App\Filament\Resources\Orders\RelationManagers;

 
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\Summarizers\Summarizer;
use Filament\Tables\Table;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class OrderItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'orderItems'; 

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('prod_id')->label('Product'),
                Tables\Columns\TextColumn::make('qty'),
                Tables\Columns\TextColumn::make('price')->money('kes'),
                Tables\Columns\TextColumn::make('computed_total')
                    ->label('Total')
                    ->money('kes')
                    ->getStateUsing(fn($record) => $record->qty * $record->price), 
                Tables\Columns\TextColumn::make('computed_total')
                    ->label('Total')
                    ->money('kes')
                    // ->label('') 
                    ->getStateUsing(fn($record) => $record->qty * $record->price)
                    ->summarize(
                        Summarizer::make()
                             ->label('') 
                            ->money('kes')
                            ->using(fn(Builder $query) => $query->sum(DB::raw('price * qty')))
                    ),

            ]);
    }

}
