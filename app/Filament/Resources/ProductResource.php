<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Category;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Spatie\Tags\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Arr;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-m-squares-2x2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Product Name')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('image')
                    ->label('Product Images')
                    ->multiple()
                    ->required()
                    ->image()
                    ->directory('products/images')
                    ->maxSize(2048), // Set max file size if needed

                TextInput::make('price')
                    ->label('Price')
                    ->numeric() // Memastikan input berupa angka
                    ->prefix('Rp') // Menambahkan prefix "Rp" sebelum input
                    ->required(),

                TextInput::make('qty')
                    ->label('Quantity')
                    ->required()
                    ->numeric(),

                Textarea::make('desc')
                    ->label('Description')
                    ->maxLength(65535),

                Select::make('color')
                    ->label('Color Variants')
                    ->multiple()
                    ->options([
                        'red' => 'Red',
                        'blue' => 'Blue',
                        'green' => 'Green',
                        'yellow' => 'Yellow',
                        'black' => 'Black',
                    ])
                    ->placeholder('Select colors')
                    ->searchable()
                    ->required(),

                Select::make('categories')
                    ->label('Categories')
                    ->multiple() // Mengizinkan pemilihan banyak kategori
                    ->relationship('categories', 'name') // Menggunakan relasi many-to-many
                    ->options(Category::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('name')
                    ->label('Product Name')
                    ->searchable()
                    ->sortable(),

                ImageColumn::make('image')
                    ->label('Image')
                    ->getStateUsing(fn($record) => Arr::first($record->image))
                    ->disk('public')
                    ->height(100)
                    ->width(100),

                TextColumn::make('price')
                    ->label('Price')
                    ->sortable()
                    ->money('idr', true), // Menampilkan dalam format uang

                TextColumn::make('qty')
                    ->label('Quantity')
                    ->sortable(),

                TextColumn::make('desc')
                    ->label('Description')
                    ->limit(50), // Batasi tampilan deskripsi di tabel

                TextColumn::make('categories.name')
                    ->label('Categories')
                    ->wrap() // Menampilkan semua kategori yang terkait
                    ->sortable(),

            ])->filters([
                // Tambahkan filter jika diperlukan
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
