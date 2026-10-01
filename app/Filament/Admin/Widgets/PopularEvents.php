<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Event;
use App\Models\OrderItem;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class PopularEvents extends BaseWidget
{
    protected static ?int $sort = 6;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Event::query()
                    ->with(['category'])
                    ->withCount('tickets')
                    ->orderBy('tickets_count', 'desc')
                    ->limit(10)
            )
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Image')
                    ->circular()
                    ->size(50),
                
                Tables\Columns\TextColumn::make('name')
                    ->label('Event Name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(40),
                
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->badge()
                    ->color('info'),
                
                Tables\Columns\TextColumn::make('location_city')
                    ->label('Location')
                    ->searchable()
                    ->icon('heroicon-m-map-pin'),
                
                Tables\Columns\TextColumn::make('start_time')
                    ->label('Date')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->icon('heroicon-m-calendar'),
                
                Tables\Columns\TextColumn::make('tickets_count')
                    ->label('Total Tickets')
                    ->badge()
                    ->color('success')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->label('View')
                    ->icon('heroicon-m-eye')
                    ->url(fn (Event $record): string => route('filament.admin.resources.events.edit', ['record' => $record])),
            ]);
    }

    protected function getTableHeading(): string
    {
        return 'Most Popular Events (by ticket sales)';
    }
}
