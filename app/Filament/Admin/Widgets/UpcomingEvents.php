<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Event;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class UpcomingEvents extends BaseWidget
{
    protected static ?int $sort = 4;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Event::query()
                    ->with(['category'])
                    ->where('start_time', '>', now())
                    ->orderBy('start_time', 'asc')
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
                    ->label('Tickets')
                    ->counts('tickets')
                    ->badge()
                    ->color('success'),
                
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
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
        return 'Upcoming Events';
    }
}
