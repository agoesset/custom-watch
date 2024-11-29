<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Category;
use App\Models\Product;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

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

                TextInput::make('price')
                    ->label('Price')
                    ->numeric()
                    ->prefix('Rp')
                    ->required(),

                TextInput::make('qty')
                    ->label('Quantity')
                    ->required()
                    ->numeric(),

                Select::make('categories')
                    ->label('Categories')
                    ->multiple()
                    ->relationship('categories', 'name')
                    ->options(Category::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),

                RichEditor::make('description')
                    ->label('Description'),

                RichEditor::make('specification')
                    ->label('Specification'),

                RichEditor::make('material')
                    ->label('Material'),

                Repeater::make('color')
                    ->label('Color Variants')
                    ->schema([
                        ColorPicker::make('hex_color')
                            ->label('Color Code')
                    ])
                    ->createItemButtonLabel('Add Color')
                    ->minItems(1)
                    ->maxItems(10),

                FileUpload::make('image')
                    ->image()
                    ->multiple()
                    ->directory('products')
                    ->maxSize(2048)
                    ->afterStateUpdated(function ($state, $old, $set) {
                        // Hapus gambar lama ketika ada update gambar baru
                        if (!empty($old)) {
                            foreach ($old as $oldImage) {
                                Storage::disk('public')->delete($oldImage);
                            }
                        }
                        $set('image', $state);
                    })
                    ->deleteUploadedFileUsing(function ($file) {
                        // Hapus file saat tombol delete ditekan
                        Storage::disk('public')->delete($file);
                    })
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
