<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TiketResource\Pages;
use App\Models\Tiket;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\DateColumn;
use Filament\Resources\Resource;

class TiketResource extends Resource
{
    protected static ?string $model = Tiket::class;

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('nama_event')->required(),
                DatePicker::make('tanggal_event')->required(),
                TextInput::make('lokasi')->required(),
                TextInput::make('harga')->numeric()->required(),
                TextInput::make('stok')->numeric()->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_event'),
                TextColumn::make('tanggal_event')
                    ->dateTime('d-m-Y'), // Format tanggal
                TextColumn::make('lokasi'),
                TextColumn::make('harga')->money('IDR'),
                TextColumn::make('stok'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListTikets::route('/'),
            'create' => Pages\CreateTiket::route('/create'),
            'edit' => Pages\EditTiket::route('/{record}/edit'),
        ];
    }
}
