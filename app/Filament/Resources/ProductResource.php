<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Illuminate\Support\Facades\Storage;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('product_id')
                ->disabled()
                ->dehydrated(false)
                ->visible(fn ($record) => $record !== null),
            TextInput::make('name')
                ->required()
                ->maxLength(255),
            Forms\Components\Select::make('category_id')
                ->relationship(name: 'category', titleAttribute: 'name')
                ->searchable()
                ->preload() 
                ->required(),
            FileUpload::make('image')
                ->image()
                ->directory('products/images')
                ->required(),
            TextInput::make('brand')
                ->required(),
            TextInput::make('purchase_price')
                ->label('Purchase Price (LKR)')
                ->numeric()
                ->required(),
            TextInput::make('price')
                ->label('Price (LKR)')
                ->numeric()
                ->required(),
            TextInput::make('discount')
                ->label('Discount (%)')
                ->numeric()
                ->default(0)
                ->required(),
            TextInput::make('stock')
                ->label('Stock Quantity')
                ->numeric()
                ->default(0)
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('product_id')
                ->label('Product ID')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('name')
                ->label('Product Name'),
            Tables\Columns\ImageColumn::make('image')
                ->label('Image'),
            Tables\Columns\TextColumn::make('brand'),
            Tables\Columns\TextColumn::make('purchase_price')
                ->label('Purchase Price (LKR)')
                ->formatStateUsing(fn ($state) => number_format($state, 2)),
            Tables\Columns\TextColumn::make('price')
                ->label('Price (LKR)')
                ->formatStateUsing(fn ($state) => number_format($state, 2)),
            Tables\Columns\TextColumn::make('discount')
                ->label('Discount (%)')
                ->formatStateUsing(fn ($state) => $state . '%'),
            Tables\Columns\TextColumn::make('stock'),
        ])
        ->filters([])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\Action::make('printBarcode')
                ->label('Print Barcode')
                ->icon('heroicon-o-printer')
                ->url(fn (Product $record): string => route('print-barcode', ['id' => $record->id]))
                ->openUrlInNewTab(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
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