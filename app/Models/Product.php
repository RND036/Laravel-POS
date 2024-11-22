<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Picqer\Barcode\BarcodeGeneratorPNG;

class Product extends Model
{
    protected $fillable = [
        'product_id',
        'barcode',
        'name',
        'category_id',
        'image',
        'brand',
        'purchase_price',
        'price',
        'discount',
        'stock',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->product_id = 'PID-' . strtoupper(uniqid());
        });

        static::created(function ($product) {
            // Generate and save barcode
            $generator = new BarcodeGeneratorPNG();
            $barcode = $generator->getBarcode($product->product_id, $generator::TYPE_CODE_128);

            $barcodeDirectory = 'products/barcodes/';
            if (!Storage::disk('public')->exists($barcodeDirectory)) {
                Storage::disk('public')->makeDirectory($barcodeDirectory);
            }

            $barcodePath = $barcodeDirectory . $product->product_id . '.png';
            Storage::disk('public')->put($barcodePath, $barcode);

            // Update the product with the barcode path
            $product->barcode = $barcodePath;
            $product->save();
        });
    }
    
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}