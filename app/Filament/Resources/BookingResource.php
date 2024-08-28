<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Models\Appointment;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table as FilamentTable;

class BookingResource extends Resource
{
    protected static ?string $model = Appointment::class;


    public static function table(FilamentTable $table): FilamentTable
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Customer')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('service.name')
                    ->label('Service')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('appointment_date')
                    ->sortable()
                    ->date(),
                Tables\Columns\TextColumn::make('appointment_time')
                    ->sortable()
                    ->time(),
                Tables\Columns\TextColumn::make('group_size')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Booking Date')
                    ->date(),
            ])
            ->filters([
                // Add any filters you need here
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
