<?php
namespace App\Filament\Resources\Orders\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class OrderPaymentRelationManager extends RelationManager
{
    protected static string $relationship = 'payment'; 

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('amount')->money('kes'),
                Tables\Columns\TextColumn::make('status')->label('Status')->badge(),
            ]);
    }

}
