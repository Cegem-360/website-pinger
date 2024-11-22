<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MonitorResource\Pages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Spatie\UptimeMonitor\Models\Monitor;

class MonitorResource extends Resource
{
    protected static ?string $model = Monitor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('url')
                    ->required(),
                Forms\Components\Toggle::make('uptime_check_enabled')
                    ->required(),
                Forms\Components\TextInput::make('look_for_string')
                    ->required(),
                Forms\Components\TextInput::make('uptime_check_interval_in_minutes')
                    ->required(),
                Forms\Components\TextInput::make('uptime_status')
                    ->required(),
                Forms\Components\Textarea::make('uptime_check_failure_reason')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('uptime_check_times_failed_in_a_row')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\DateTimePicker::make('uptime_status_last_change_date'),
                Forms\Components\DateTimePicker::make('uptime_last_check_date'),
                Forms\Components\DateTimePicker::make('uptime_check_failed_event_fired_on_date'),
                Forms\Components\TextInput::make('uptime_check_method')
                    ->required(),
                Forms\Components\Textarea::make('uptime_check_payload')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('uptime_check_additional_headers')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('uptime_check_response_checker'),
                Forms\Components\Toggle::make('certificate_check_enabled')
                    ->required(),
                Forms\Components\TextInput::make('certificate_status')
                    ->required(),
                Forms\Components\DateTimePicker::make('certificate_expiration_date'),
                Forms\Components\TextInput::make('certificate_issuer'),
                Forms\Components\TextInput::make('certificate_check_failure_reason')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('url')
                    ->searchable(),
                Tables\Columns\IconColumn::make('uptime_check_enabled')
                    ->boolean(),
                Tables\Columns\TextColumn::make('look_for_string')
                    ->searchable(),
                Tables\Columns\TextColumn::make('uptime_check_interval_in_minutes')
                    ->searchable(),
                Tables\Columns\TextColumn::make('uptime_status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('uptime_check_times_failed_in_a_row')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('uptime_status_last_change_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('uptime_last_check_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('uptime_check_failed_event_fired_on_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('uptime_check_method')
                    ->searchable(),
                Tables\Columns\TextColumn::make('uptime_check_response_checker')
                    ->searchable(),
                Tables\Columns\IconColumn::make('certificate_check_enabled')
                    ->boolean(),
                Tables\Columns\TextColumn::make('certificate_status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('certificate_expiration_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('certificate_issuer')
                    ->searchable(),
                Tables\Columns\TextColumn::make('certificate_check_failure_reason')
                    ->searchable(),
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
            'index' => Pages\ListMonitors::route('/'),
            'create' => Pages\CreateMonitor::route('/create'),
            'edit' => Pages\EditMonitor::route('/{record}/edit'),
        ];
    }
}
