<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomProductResource\Pages;
use App\Filament\Resources\CustomProductResource\RelationManagers;
use App\Models\CustomProduct;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomProductResource extends Resource
{
    protected static ?string $model = CustomProduct::class;

    protected static ?string $navigationIcon = 'heroicon-m-squares-plus';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Product Name')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('image')
                    ->label('Product Image')
                    ->image()
                    ->required()
                    ->directory('uploads/images') // Ganti dengan direktori penyimpanan yang Anda inginkan
                    ->maxSize(2048), // Maksimum ukuran file dalam KB (2MB)

                Select::make('part')
                    ->label('Part')
                    ->options([
                        'Cases' => 'Cases',
                        'Dials' => 'Dials',
                        'Crown' => 'Crown',
                        'Bezel' => 'Bezel',
                        'Ring' => 'Ring',
                        'Hand' => 'Hand',
                        'Second Hand' => 'Second Hand',
                        'Rubber' => 'Rubber',
                    ])
                    ->required(),

                TextInput::make('price')
                    ->label('Price')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('name')
                    ->label('Product Name')
                    ->sortable()
                    ->searchable(),

                ImageColumn::make('image')
                    ->label('Product Image')
                    ->sortable()
                    ->size(50, 50) // Menentukan ukuran pratinjau gambar.
                    ->circular(), // Membuat gambar menjadi bulat, bisa dihilangkan jika tidak perlu.

                BadgeColumn::make('part')
                    ->label('Part')
                    ->sortable()
                    ->colors([
                        'primary' => 'Cases',
                        'success' => 'Dials',
                        'warning' => 'Crown',
                        'danger' => 'Bezel',
                        'info' => 'Ring',
                        'gray' => 'Hand',
                        'purple' => 'Second Hand',
                        'black' => 'Rubber',
                    ]),

                TextColumn::make('price')
                    ->label('Price')
                    ->sortable()
                    ->money('IDR'), // Menyesuaikan dengan mata uang yang diinginkan.
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
            'index' => Pages\ListCustomProducts::route('/'),
            'create' => Pages\CreateCustomProduct::route('/create'),
            'edit' => Pages\EditCustomProduct::route('/{record}/edit'),
        ];
    }
}
