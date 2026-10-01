<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PriceComponentResource\Pages;
use App\Models\PriceComponent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PriceComponentResource extends Resource
{
    protected static ?string $model = PriceComponent::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $navigationLabel = 'Komponen Harga';

    protected static ?string $modelLabel = 'Komponen Harga';

    protected static ?string $pluralModelLabel = 'Komponen Harga';

    protected static ?string $navigationGroup = 'Tiket';

    protected static ?int $navigationSort = 10;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('e.g. Service Fee, Admin Fee'),
                Forms\Components\Select::make('type')
                    ->label('Tipe')
                    ->options([
                        PriceComponent::TYPE_FIXED => 'Tetap (Rp)',
                        PriceComponent::TYPE_PERCENTAGE => 'Persen (%)',
                    ])
                    ->required()
                    ->default(PriceComponent::TYPE_FIXED)
                    ->live(),
                Forms\Components\TextInput::make('value')
                    ->label('Nilai')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->default(0)
                    ->helperText(fn (Forms\Get $get) => $get('type') === PriceComponent::TYPE_PERCENTAGE
                        ? 'Persentase dari subtotal (0-100)'
                        : 'Jumlah tetap dalam Rupiah'),
                Forms\Components\Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
                Forms\Components\TextInput::make('sort_order')
                    ->label('Urutan tampil')
                    ->numeric()
                    ->minValue(0)
                    ->default(0)
                    ->helperText('Angka lebih kecil = tampil lebih atas'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipe')
                    ->formatStateUsing(fn (string $state): string => $state === PriceComponent::TYPE_PERCENTAGE ? 'Persen (%)' : 'Tetap (Rp)')
                    ->badge()
                    ->color(fn (string $state): string => $state === PriceComponent::TYPE_PERCENTAGE ? 'info' : 'success'),
                Tables\Columns\TextColumn::make('value')
                    ->label('Nilai')
                    ->formatStateUsing(fn ($state, PriceComponent $record) => $record->type === PriceComponent::TYPE_PERCENTAGE
                        ? $state . '%'
                        : 'Rp ' . number_format((float) $state, 0, ',', '.')),
                Tables\Columns\IconColumn::make('is_active')->label('Aktif')->boolean(),
                Tables\Columns\TextColumn::make('sort_order')->label('Urutan')->sortable(),
            ])
            ->defaultSort('sort_order')
            ->filters([])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPriceComponents::route('/'),
            'create' => Pages\CreatePriceComponent::route('/create'),
            'edit' => Pages\EditPriceComponent::route('/{record}/edit'),
        ];
    }
}
