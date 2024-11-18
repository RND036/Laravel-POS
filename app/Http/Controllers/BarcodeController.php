<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Response;
use Picqer\Barcode\BarcodeGeneratorPNG;

class BarcodeController extends Controller
{
    public function print($id)
    {
        $product = Product::findOrFail($id);
        
        return view('barcode.print-barcode', [
            'product' => $product
        ]);
    }
}
