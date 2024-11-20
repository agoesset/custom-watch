<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WatchStrapResource\Pages;
use App\Filament\Resources\WatchStrapResource\RelationManagers;
use App\Models\WatchStrap;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class WatchStrapResource extends Resource
{
    protected static ?string $model = WatchStrap::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('watchTypes')
                    ->relationship('watchTypes', 'name')
                    ->label('Watch Types')
                    ->required(),
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Textarea::make('desc')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->directory('straps')
                    ->maxSize(2048)
                    ->deleteUploadedFileUsing(function ($file, $record) {
                        // Hapus file lama
                        if ($record && $record->image) {
                            Storage::disk('public')->delete($record->image);
                        }
                    })
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('watchTypes.name') // Akses data dari relasi
                    ->Sortable()
                    ->label('Watch Type'),
                Tables\Columns\ImageColumn::make('image'),
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
            'index' => Pages\ListWatchStraps::route('/'),
            'create' => Pages\CreateWatchStrap::route('/create'),
            'edit' => Pages\EditWatchStrap::route('/{record}/edit'),
        ];
    }
}
