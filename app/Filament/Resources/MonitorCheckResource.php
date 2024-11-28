<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MonitorCheckResource\Pages;
use App\Filament\Resources\MonitorCheckResource\Widgets\AverageResponseTime;
use App\Models\MonitorCheck;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MonitorCheckResource extends Resource
{
    protected static ?string $model = MonitorCheck::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('monitor_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('response_time_in_ms')
                    ->numeric(),
                Forms\Components\TextInput::make('status_code')
                    ->numeric(),
                Forms\Components\TextInput::make('status')
                    ->required(),
                Forms\Components\DateTimePicker::make('checked_at')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('monitor_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('response_time_in_ms')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status_code')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('checked_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMonitorChecks::route('/'),
            'create' => Pages\CreateMonitorCheck::route('/create'),
            'edit' => Pages\EditMonitorCheck::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            AverageResponseTime::class,
        ];
    }
}
